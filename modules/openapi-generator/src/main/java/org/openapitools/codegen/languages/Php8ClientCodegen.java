/*
 * Copyright 2018 OpenAPI-Generator Contributors (https://openapi-generator.tech)
 * Copyright 2018 SmartBear Software
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

package org.openapitools.codegen.languages;

import io.swagger.v3.oas.models.media.ArraySchema;
import io.swagger.v3.oas.models.media.ComposedSchema;
import io.swagger.v3.oas.models.media.Schema;
import io.swagger.v3.oas.models.media.StringSchema;
import org.apache.commons.lang3.StringUtils;
import org.openapitools.codegen.*;
import org.openapitools.codegen.meta.features.*;
import org.openapitools.codegen.utils.ModelUtils;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.io.File;
import java.util.*;
import java.util.regex.Matcher;
import java.util.stream.Collectors;

import static org.openapitools.codegen.utils.StringUtils.underscore;

public class Php8ClientCodegen extends AbstractPhpCodegen {
    @SuppressWarnings("hiding")
    private final Logger LOGGER = LoggerFactory.getLogger(Php8ClientCodegen.class);
    private final List<String> TYPES = Arrays.asList("array", "bool", "int", "float", "object", "string");

    public Php8ClientCodegen() {
        super();

        modifyFeatureSet(features -> features
                .includeDocumentationFeatures(DocumentationFeature.Readme)
                .wireFormatFeatures(EnumSet.of(WireFormatFeature.JSON, WireFormatFeature.XML))
                .securityFeatures(EnumSet.noneOf(SecurityFeature.class))
                .excludeGlobalFeatures(
                        GlobalFeature.XMLStructureDefinitions,
                        GlobalFeature.Callbacks,
                        GlobalFeature.LinkObjects,
                        GlobalFeature.ParameterStyling
                )
                .excludeSchemaSupportFeatures(
                        SchemaSupportFeature.Polymorphism
                )
                .includeSchemaSupportFeatures(
                        SchemaSupportFeature.Union
                )
        );

        // clear import mapping (from default generator) as php does not use it
        // at the moment
        importMapping.clear();

        setInvokerPackage("OpenAPI\\Client");
        setApiPackage(getInvokerPackage() + "\\" + apiDirName);
        setModelPackage(getInvokerPackage() + "\\" + modelDirName);
        setPackageName("OpenAPIClient-php");
        supportsInheritance = true;
        setOutputDir("generated-code" + File.separator + "php");
        modelTestTemplateFiles.put("model_test.mustache", ".php");
        embeddedTemplateDir = templateDir = "php8";

        // default HIDE_GENERATION_TIMESTAMP to true
        hideGenerationTimestamp = Boolean.TRUE;

        languageSpecificPrimitives.add("array"); // Shouldn't be imported
        languageSpecificPrimitives.remove("DateTime"); // This needs to be imported

        typeMapping.put("date", "DateTime");
        typeMapping.put("Date", "DateTime");
        typeMapping.put("DateTime", "DateTime");
        typeMapping.put("file", "SplFileObject");
        typeMapping.put("number+float", "float");
        typeMapping.put("number+double", "float");
        typeMapping.put("number", "float|int");

        reservedWords.add("match");
        languageSpecificPrimitives.remove("boolean");
        languageSpecificPrimitives.remove("integer");
        languageSpecificPrimitives.remove("number");
        languageSpecificPrimitives.remove("byte");

        // provide primitives to mustache template
        List<String> sortedLanguageSpecificPrimitives = new ArrayList<String>(languageSpecificPrimitives);
        Collections.sort(sortedLanguageSpecificPrimitives);
        String primitives = "'" + StringUtils.join(sortedLanguageSpecificPrimitives, "', '") + "'";
        additionalProperties.put("primitives", primitives);

        cliOptions.add(new CliOption(CodegenConstants.HIDE_GENERATION_TIMESTAMP, CodegenConstants.ALLOW_UNICODE_IDENTIFIERS_DESC)
                .defaultValue(Boolean.TRUE.toString()));
    }

    @Override
    public CodegenType getTag() {
        return CodegenType.CLIENT;
    }

    @Override
    public String getName() {
        return "php8";
    }

    @Override
    public String getHelp() {
        return "Generates a PHP client library.";
    }

    @Override
    public void processOpts() {
        super.processOpts();

        supportingFiles.add(new SupportingFile("ApiException.mustache", toSrcPath(invokerPackage, srcBasePath), "ApiException.php"));
        supportingFiles.add(new SupportingFile("Configuration.mustache", toSrcPath(invokerPackage, srcBasePath), "Configuration.php"));
        supportingFiles.add(new SupportingFile("ObjectSerializer.mustache", toSrcPath(invokerPackage, srcBasePath), "ObjectSerializer.php"));
        supportingFiles.add(new SupportingFile("ModelInterface.mustache", toSrcPath(modelPackage, srcBasePath), "ModelInterface.php"));
        supportingFiles.add(new SupportingFile("HeaderSelector.mustache", toSrcPath(invokerPackage, srcBasePath), "HeaderSelector.php"));
        supportingFiles.add(new SupportingFile("composer.mustache", "", "composer.json"));
        supportingFiles.add(new SupportingFile("README.mustache", "", "README.md"));
        supportingFiles.add(new SupportingFile("phpunit.xml.mustache", "", "phpunit.xml.dist"));
        supportingFiles.add(new SupportingFile(".travis.yml", "", ".travis.yml"));
        supportingFiles.add(new SupportingFile(".php_cs", "", ".php_cs"));
        supportingFiles.add(new SupportingFile("git_push.sh.mustache", "", "git_push.sh"));
    }


    /**
     * Returns the directory path from basePath to specified package
     */
    @Override
    public String toSrcPath(final String packageName, final String basePath) {
        String relativePackageName = packageName.replace(invokerPackage, "");
        String correctedBasePath = (basePath != null && basePath.length() > 0) ?
                basePath.replaceAll("[\\\\/]?$", "") + "/" : basePath;

        // Trim prefix file separators from package path
        String packagePath = StringUtils.removeStart(
                // Replace period, backslash, forward slash with forwad slash in package name
                relativePackageName.replaceAll("[\\.\\\\/]", Matcher.quoteReplacement("/")),
                "/"
        );

        // Trim trailing file separators from the overall path
        return StringUtils.removeEnd(correctedBasePath + packagePath, "/");
    }

    /**
     * Return the fully-qualified "Model" name for import
     *
     * @param name the name of the "Model"
     * @return the fully-qualified "Model" name for import
     */
    @Override
    public String toModelImport(String name) {
        if ("".equals(modelPackage())) {
            return name;
        } else if ("\\SplFileObject".equals(name) || "SplFileObject".equals(name)) {
            return "SplFileObject";
        } else if ("DateTime".equals(name)) {
            return "DateTime";
        } else {
            return modelPackage() + "\\" + name;
        }
    }

    @Override
    protected boolean needToImport(String type) {
        return super.needToImport(type) && !"Set".equals(type) && !type.contains("|");
    }

    @Override
    public String getSchemaType(Schema schema) {
        if (schema instanceof ComposedSchema) { // composed schema
            ComposedSchema cs = (ComposedSchema) schema;
            // Get the interfaces, i.e. the set of elements under 'allOf', 'anyOf' or 'oneOf'.
            List<Schema> schemas = ModelUtils.getInterfaces(cs);

            List<String> names = new ArrayList<>();
            // Build a list of the schema types under each interface.
            // For example, if a 'allOf' composed schema has $ref children,
            // add the type of each child to the list of names.
            for (Schema s : schemas) {
                String typeString = getSchemaType(s);
                String[] splitTypeArray = typeString.split("\\|");
                for (String splitType : splitTypeArray) {
                    if (!names.contains(splitType))
                        names.add(splitType);
                }
            }

            if (cs.getAllOf() != null) {
                return null;
            } else if (cs.getOneOf() != null || cs.getAnyOf() != null) {
                return String.join("|", names);
            }
        } else if (schema.getNot() != null) {
            List<String> names = new ArrayList<>();
            if (schema.getNot() instanceof ComposedSchema) {
                ComposedSchema cs = (ComposedSchema) schema.getNot();
                // Get the interfaces, i.e. the set of elements under 'allOf', 'anyOf' or 'oneOf'.
                List<Schema> schemas = ModelUtils.getInterfaces(cs);


                // Build a list of the schema types under each interface.
                // For example, if a 'allOf' composed schema has $ref children,
                // add the type of each child to the list of names.
                if (cs.getAnyOf() != null) {
                    for (Schema s : schemas) {
                        String typeString = getSchemaType(s);
                        String[] splitTypeArray = typeString.split("\\|");
                        for (String splitType : splitTypeArray) {
                            if (!names.contains(splitType))
                                names.add(splitType);
                        }
                    }
                }

            } else {
                String typeString = getSchemaType(schema.getNot());
                String[] splitTypeArray = typeString.split("\\|");
                Collections.addAll(names, splitTypeArray);
            }

            List<String> allowableTypes = new ArrayList<String>();
            for (String type : TYPES) {
                if (!names.contains(type)) {
                    allowableTypes.add(type);
                }
            }
            return String.join("|", allowableTypes);

        }

        // Since we have already checked for the Container Schema we can call the DefaultCodegen getSingleSchemaType
        // This will return the type according to openAPI unless we have a type+format key in typeMapping
        // This check comes first
        String openAPIType = getSingleSchemaType(schema);
        String type = typeMapping.getOrDefault(openAPIType, openAPIType);
        if (type == null) {
            return null;
        }
        return Arrays.stream(type.split("\\|")).map(this::getModelNameForNonPrimitiveOrInstantiationType).collect(Collectors.joining("|"));
    }

    private String getModelNameForNonPrimitiveOrInstantiationType(String t) {
        if (!languageSpecificPrimitives.contains(t) && !instantiationTypes.containsKey(t)) {
            return toModelName(t);
        } else {
            return t;
        }
    }

    @Override
    public String getTypeDeclaration(Schema p) {
        if (ModelUtils.isArraySchema(p)) {
            ArraySchema ap = (ArraySchema) p;
            Schema inner = ap.getItems();
            if (inner == null) {
                LOGGER.warn("{}(array property) does not have a proper inner type defined.Default to string",
                        ap.getName());
                inner = new StringSchema().description("TODO default missing array inner type to string");
            }
            String innerType = getTypeDeclaration(inner);
            return innerType.contains("|") ? "(" + innerType + ")[]" : innerType + "[]";
        } else if (ModelUtils.isMapSchema(p)) {
            Schema inner = getAdditionalProperties(p);
            if (inner == null) {
                LOGGER.warn("{}(map property) does not have a proper inner type defined. Default to string", p.getName());
                inner = new StringSchema().description("TODO default missing map inner type to string");
            }
            return getSchemaType(p) + "<string," + getTypeDeclaration(inner) + ">";
        } else if ((StringUtils.isNotBlank(p.get$ref()) && ModelUtils.getReferencedSchema(this.openAPI, p).getEnum() != null && !ModelUtils.getReferencedSchema(this.openAPI, p).getEnum().isEmpty())) {// model
            String type = super.getTypeDeclaration(p);
            return (!languageSpecificPrimitives.contains(type))
                    ? ModelUtils.getReferencedSchema(this.openAPI, p).getType() : type;
        } else if (StringUtils.isNotBlank(p.get$ref())) {
            return getSchemaType(p);
        }
        return super.getTypeDeclaration(p);
    }

    @Override
    public String getTypeDeclaration(String name) {
        return name;
    }

    @Override
    public String toEnumVarName(String name, String datatype) {
        if (name.length() == 0) {
            return "EMPTY";
        }

        // for symbol, e.g. $, #
        if (getSymbolName(name) != null) {
            return (getSymbolName(name)).toUpperCase(Locale.ROOT);
        }

        // number
        if ("int".equals(datatype) || "double".equals(datatype) || "float".equals(datatype)) {
            String varName = name;
            varName = varName.replaceAll("-", "MINUS_");
            varName = varName.replaceAll("\\+", "PLUS_");
            varName = varName.replaceAll("\\.", "_DOT_");
            return "_" + varName;
        }

        // string
        String enumName = sanitizeName(underscore(name).toUpperCase(Locale.ROOT));
        enumName = enumName.replaceFirst("^_", "");
        enumName = enumName.replaceFirst("_$", "");

        if (isReservedWord(enumName) || enumName.matches("\\d.*")) { // reserved word or starts with number
            return escapeReservedWord(enumName);
        } else {
            return enumName;
        }
    }

    @Override
    @SuppressWarnings({"static-method", "unchecked"})
    public Map<String, Object> postProcessAllModels(Map<String, Object> objs) {
        super.postProcessAllModels(objs);
        Set<String> allModelNames = objs.keySet();
        for (Object _ob : objs.values()) {
            Map<String, Object> models = (Map<String, Object>) _ob;
            List<Object> modelTemplateList = (List<Object>) models.get("models");
            if (modelTemplateList != null && !modelTemplateList.isEmpty()) {
                Map<String, Object> modelTemplate = (Map<String, Object>) modelTemplateList.get(0);
                if (modelTemplate != null && modelTemplate.containsKey("model")) {
                    CodegenModel model = (CodegenModel) modelTemplate.get("model");
                    List<CodegenProperty> vars = model.getVars();
                    for (CodegenProperty var : vars) {
                        if (!var.required && var.defaultValue == null) {
                            if(!var.isNullable) {
                                LOGGER.warn("variable " + var.name + " is not required and has default value null, yet isn't nullable. Changing to nullable");
                            }
                            var.isNullable = true;
                        }

                        if (var.isNullable) {
                            if (!Objects.equals(var.dataType, "mixed")) {
                                if (var.dataType.contains("|") || var.isArray || var.isMap) {
                                    var.dataType = var.dataType + "|null";
                                    var.datatypeWithEnum = var.datatypeWithEnum + "|null";
                                } else {
                                    var.dataType = "?" + var.dataType;
                                    var.datatypeWithEnum = "?" + var.datatypeWithEnum;
                                }
                            }
                        }

                        updateIsPrimitive(var);

                        // Add a vendor extension for the doc type
                        var.vendorExtensions.put("docType", dataTypeToDocType(var.dataType));
                    }
                    if (model.isAlias) {
                        // alias to number, string, enum, etc, which should not be generated as model
                        continue;  // Ignore as no file is created for this
                    }
                    model.imports = model.imports.stream().filter(imp -> !allModelNames.contains(imp)).collect(Collectors.toSet());
                    // Assume that any import added with a pipe must have come from our type mapping system, which only maps to primitives
                    model.imports = model.imports.stream().filter(imp -> !imp.contains("|")).collect(Collectors.toSet());
                }
            }
        }
        return objs;
    }

    @Override
    public void postProcessParameter(CodegenParameter parameter) {
        super.postProcessParameter(parameter);
        if (!parameter.required && parameter.defaultValue == null) {
            if(!parameter.isNullable) {
                LOGGER.warn("parameter " + parameter.paramName + " is not required and has default value null, yet isn't nullable. Changing to nullable");
            }
            parameter.isNullable = true;
        }

        if (parameter.isNullable) {
            if (!Objects.equals(parameter.dataType, "mixed")) {
                if (parameter.dataType.contains("|") || parameter.isArray || parameter.isMap) {
                    parameter.dataType = parameter.dataType + "|null";
                    parameter.datatypeWithEnum = parameter.datatypeWithEnum + "|null";
                } else {
                    parameter.dataType = "?" + parameter.dataType;
                    parameter.datatypeWithEnum = "?" + parameter.datatypeWithEnum;
                }
            }
        }

        if (parameter.dataType.equals("mixed") || parameter.dataType.contains("|")) {
            parameter.isAnyType = true;
        }

        updateIsPrimitive(parameter);

        // Add a vendor extension for the doc type
        parameter.vendorExtensions.put("docType", dataTypeToDocType(parameter.dataType));
    }

    @Override
    public Map<String, Object> postProcessOperationsWithModels(Map<String, Object> objs, List<Object> allModels) {
        objs = super.postProcessOperationsWithModels(objs, allModels);
        Map<String, Object> operations = (Map<String, Object>) objs.get("operations");
        List<CodegenOperation> operation = (List<CodegenOperation>) operations.get("operation");
        for (CodegenOperation op : operation) {
            if (op.returnType != null) {
                op.returnSimpleType = !op.returnType.equals("mixed") && !op.returnType.contains("|");
            }

            for(CodegenParameter parameter : op.allParams) {
                for(CodegenProperty var : parameter.vars){
                    updateIsPrimitive(var);
                }
                updateIsPrimitive(parameter);
            }
        }

        return objs;
    }

    private void updateIsPrimitive(CodegenProperty property){
        if(property.isArray || property.isMap){
            if(property.mostInnerItems != null){
                property.isPrimitiveType = property.mostInnerItems.isPrimitiveType;
            } else if (property.items != null){
                property.isPrimitiveType = property.items.isPrimitiveType;
            }
        }
    }

    private void updateIsPrimitive(CodegenParameter parameter){
        if(parameter.isArray || parameter.isMap){
            if(parameter.mostInnerItems != null){
                parameter.isPrimitiveType = parameter.mostInnerItems.isPrimitiveType;
            } else if (parameter.items != null){
                parameter.isPrimitiveType = parameter.items.isPrimitiveType;
            }
        }
    }

    private String dataTypeToDocType(String dataType){
        String docType = dataType;
        if (docType.contains("?")) {
            docType = docType.replace("?", "") + "|null";
        }
        docType = docType.replace("|","&vert;");
        return docType;
    }
}