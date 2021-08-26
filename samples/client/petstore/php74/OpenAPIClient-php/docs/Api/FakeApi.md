# OpenAPI\Client\Api\FakeApi <a id="top-of-page"></a>

All URIs are relative to *http://petstore.swagger.io:80/v2*.

Method | HTTP request | Description
------------- | ------------- | -------------
[**fakeHealthGet**](FakeApi.md#fakehealthget) | **GET** /fake/health | Health check endpoint
[**fakeHttpSignatureTest**](FakeApi.md#fakehttpsignaturetest) | **GET** /fake/http-signature-test | test http signature authentication
[**fakeOuterBooleanSerialize**](FakeApi.md#fakeouterbooleanserialize) | **POST** /fake/outer/boolean | 
[**fakeOuterCompositeSerialize**](FakeApi.md#fakeoutercompositeserialize) | **POST** /fake/outer/composite | 
[**fakeOuterNumberSerialize**](FakeApi.md#fakeouternumberserialize) | **POST** /fake/outer/number | 
[**fakeOuterStringSerialize**](FakeApi.md#fakeouterstringserialize) | **POST** /fake/outer/string | 
[**fakePropertyEnumIntegerSerialize**](FakeApi.md#fakepropertyenumintegerserialize) | **POST** /fake/property/enum-int | 
[**testBodyWithBinary**](FakeApi.md#testbodywithbinary) | **PUT** /fake/body-with-binary | 
[**testBodyWithFileSchema**](FakeApi.md#testbodywithfileschema) | **PUT** /fake/body-with-file-schema | 
[**testBodyWithQueryParams**](FakeApi.md#testbodywithqueryparams) | **PUT** /fake/body-with-query-params | 
[**testClientModel**](FakeApi.md#testclientmodel) | **PATCH** /fake | To test \&quot;client\&quot; model
[**testEndpointParameters**](FakeApi.md#testendpointparameters) | **POST** /fake | Fake endpoint for testing various parameters 假端點 偽のエンドポイント 가짜 엔드 포인트
[**testEnumParameters**](FakeApi.md#testenumparameters) | **GET** /fake | To test enum parameters
[**testGroupParameters**](FakeApi.md#testgroupparameters) | **DELETE** /fake | Fake endpoint to test group parameters (optional)
[**testInlineAdditionalProperties**](FakeApi.md#testinlineadditionalproperties) | **POST** /fake/inline-additionalProperties | test inline additionalProperties
[**testJsonFormData**](FakeApi.md#testjsonformdata) | **GET** /fake/jsonFormData | test json serialization of form data
[**testQueryParameterCollectionFormat**](FakeApi.md#testqueryparametercollectionformat) | **PUT** /fake/test-query-parameters | 

# **fakeHealthGet**

> fakeHealthGet(): HealthCheckResult

Health check endpoint

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->fakeHealthGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->fakeHealthGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

**HealthCheckResult**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **fakeHttpSignatureTest**

> fakeHttpSignatureTest($pet, $query_1, $header_1)

test http signature authentication

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$pet = new Pet(); // Pet | Pet object that needs to be added to the store
$query_1 = 'query_1_example'; // ?string | query parameter
$header_1 = 'header_1_example'; // ?string | header parameter

try {
    $apiInstance->fakeHttpSignatureTest($pet, $query_1, $header_1);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->fakeHttpSignatureTest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**pet** | [**Pet**](../Model/Pet.md) | Pet object that needs to be added to the store |
**query_1** | **string&vert;null** | query parameter | [optional]
**header_1** | **string&vert;null** | header parameter | [optional]

### Return type

void (empty response body)

### Authorization

[http_signature_test](../../README.md#http_signature_test)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: Not defined

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **fakeOuterBooleanSerialize**

> fakeOuterBooleanSerialize($body): bool


Test serialization of outer boolean types

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = True; // ?bool | Input boolean as post body

try {
    $result = $apiInstance->fakeOuterBooleanSerialize($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->fakeOuterBooleanSerialize: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**body** | **bool&vert;null** | Input boolean as post body | [optional]

### Return type

**bool**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `*/*`

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **fakeOuterCompositeSerialize**

> fakeOuterCompositeSerialize($outer_composite): OuterComposite


Test serialization of object with outer number type

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outer_composite = new OuterComposite(); // ?OuterComposite | Input composite as post body

try {
    $result = $apiInstance->fakeOuterCompositeSerialize($outer_composite);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->fakeOuterCompositeSerialize: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**outer_composite** | [**OuterComposite&vert;null**](../Model/OuterComposite.md) | Input composite as post body | [optional]

### Return type

**OuterComposite**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `*/*`

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **fakeOuterNumberSerialize**

> fakeOuterNumberSerialize($body): float|int


Test serialization of outer number types

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new float|int(); // float|int|null | Input number as post body

try {
    $result = $apiInstance->fakeOuterNumberSerialize($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->fakeOuterNumberSerialize: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**body** | **float&vert;int&vert;null** | Input number as post body | [optional]

### Return type

**float|int**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `*/*`

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **fakeOuterStringSerialize**

> fakeOuterStringSerialize($body): string


Test serialization of outer string types

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = 'body_example'; // ?string | Input string as post body

try {
    $result = $apiInstance->fakeOuterStringSerialize($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->fakeOuterStringSerialize: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**body** | **string&vert;null** | Input string as post body | [optional]

### Return type

**string**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `*/*`

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **fakePropertyEnumIntegerSerialize**

> fakePropertyEnumIntegerSerialize($outer_object_with_enum_property): OuterObjectWithEnumProperty


Test serialization of enum (int) properties with examples

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$outer_object_with_enum_property = new OuterObjectWithEnumProperty(); // OuterObjectWithEnumProperty | Input enum (int) as post body

try {
    $result = $apiInstance->fakePropertyEnumIntegerSerialize($outer_object_with_enum_property);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->fakePropertyEnumIntegerSerialize: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**outer_object_with_enum_property** | [**OuterObjectWithEnumProperty**](../Model/OuterObjectWithEnumProperty.md) | Input enum (int) as post body |

### Return type

**OuterObjectWithEnumProperty**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `*/*`

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **testBodyWithBinary**

> testBodyWithBinary($body)


For this test, the body has to be a binary file.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = "/path/to/file.txt"; // ?SplFileObject | image to upload

try {
    $apiInstance->testBodyWithBinary($body);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->testBodyWithBinary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**body** | **SplFileObject&vert;null** | image to upload |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `image/png`
- **Accept**: Not defined

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **testBodyWithFileSchema**

> testBodyWithFileSchema($file_schema_test_class)


For this test, the body for this request must reference a schema named `File`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$file_schema_test_class = new FileSchemaTestClass(); // FileSchemaTestClass

try {
    $apiInstance->testBodyWithFileSchema($file_schema_test_class);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->testBodyWithFileSchema: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**file_schema_test_class** | [**FileSchemaTestClass**](../Model/FileSchemaTestClass.md) |  |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **testBodyWithQueryParams**

> testBodyWithQueryParams($query, $user)



### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$query = 'query_example'; // string
$user = new User(); // User

try {
    $apiInstance->testBodyWithQueryParams($query, $user);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->testBodyWithQueryParams: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**query** | **string** |  |
**user** | [**User**](../Model/User.md) |  |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **testClientModel**

> testClientModel($client): Client

To test \"client\" model
To test \"client\" model

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$client = new Client(); // Client | client model

try {
    $result = $apiInstance->testClientModel($client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->testClientModel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**client** | [**Client**](../Model/Client.md) | client model |

### Return type

**Client**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **testEndpointParameters**

> testEndpointParameters($number, $double, $pattern_without_delimiter, $byte, $integer, $int32, $int64, $float, $string, $binary, $date, $date_time, $password, $callback)

Fake endpoint for testing various parameters 假端點 偽のエンドポイント 가짜 엔드 포인트
Fake endpoint for testing various parameters 假端點 偽のエンドポイント 가짜 엔드 포인트

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: http_basic_test
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$number = new float|int(); // float|int | None
$double = 3.4; // float | None
$pattern_without_delimiter = 'pattern_without_delimiter_example'; // string | None
$byte = 'byte_example'; // string | None
$integer = 56; // ?int | None
$int32 = 56; // ?int | None
$int64 = 56; // ?int | None
$float = 3.4; // ?float | None
$string = 'string_example'; // ?string | None
$binary = "/path/to/file.txt"; // ?SplFileObject | None
$date = new DateTime(); // ?DateTime | None
$date_time = new DateTime(); // ?DateTime | None
$password = 'password_example'; // ?string | None
$callback = 'callback_example'; // ?string | None

try {
    $apiInstance->testEndpointParameters($number, $double, $pattern_without_delimiter, $byte, $integer, $int32, $int64, $float, $string, $binary, $date, $date_time, $password, $callback);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->testEndpointParameters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**number** | **float&vert;int** | None |
**double** | **float** | None |
**pattern_without_delimiter** | **string** | None |
**byte** | **string** | None |
**integer** | **int&vert;null** | None | [optional]
**int32** | **int&vert;null** | None | [optional]
**int64** | **int&vert;null** | None | [optional]
**float** | **float&vert;null** | None | [optional]
**string** | **string&vert;null** | None | [optional]
**binary** | **SplFileObject&vert;null** | None | [optional]
**date** | **DateTime&vert;null** | None | [optional]
**date_time** | **DateTime&vert;null** | None | [optional]
**password** | **string&vert;null** | None | [optional]
**callback** | **string&vert;null** | None | [optional]

### Return type

void (empty response body)

### Authorization

[http_basic_test](../../README.md#http_basic_test)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: Not defined

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **testEnumParameters**

> testEnumParameters($enum_header_string_array, $enum_header_string, $enum_query_string_array, $enum_query_string, $enum_query_integer, $enum_query_double, $enum_form_string_array, $enum_form_string)

To test enum parameters
To test enum parameters

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$enum_header_string_array = array('enum_header_string_array_example'); // string[]|null | Header parameter enum test (string array)
$enum_header_string = '-efg'; // string | Header parameter enum test (string)
$enum_query_string_array = array('enum_query_string_array_example'); // string[]|null | Query parameter enum test (string array)
$enum_query_string = '-efg'; // string | Query parameter enum test (string)
$enum_query_integer = 56; // ?int | Query parameter enum test (double)
$enum_query_double = 3.4; // ?float | Query parameter enum test (double)
$enum_form_string_array = '$'; // string[] | Form parameter enum test (string array)
$enum_form_string = '-efg'; // string | Form parameter enum test (string)

try {
    $apiInstance->testEnumParameters($enum_header_string_array, $enum_header_string, $enum_query_string_array, $enum_query_string, $enum_query_integer, $enum_query_double, $enum_form_string_array, $enum_form_string);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->testEnumParameters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**enum_header_string_array** | **string[]&vert;null** | Header parameter enum test (string array) | [optional]
**enum_header_string** | **string** | Header parameter enum test (string) | [optional] [default to &#39;-efg&#39;]
**enum_query_string_array** | **string[]&vert;null** | Query parameter enum test (string array) | [optional]
**enum_query_string** | **string** | Query parameter enum test (string) | [optional] [default to &#39;-efg&#39;]
**enum_query_integer** | **int&vert;null** | Query parameter enum test (double) | [optional]
**enum_query_double** | **float&vert;null** | Query parameter enum test (double) | [optional]
**enum_form_string_array** | **string[]** | Form parameter enum test (string array) | [optional] [default to &#39;$&#39;]
**enum_form_string** | **string** | Form parameter enum test (string) | [optional] [default to &#39;-efg&#39;]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: Not defined

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **testGroupParameters**

> testGroupParameters($required_string_group, $required_boolean_group, $required_int64_group, $string_group, $boolean_group, $int64_group)

Fake endpoint to test group parameters (optional)
Fake endpoint to test group parameters (optional)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Bearer (JWT) authorization: bearer_test
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$associate_array['required_string_group'] = 56; // int | Required String in group parameters
$associate_array['required_boolean_group'] = True; // bool | Required Boolean in group parameters
$associate_array['required_int64_group'] = 56; // int | Required Integer in group parameters
$associate_array['string_group'] = 56; // ?int | String in group parameters
$associate_array['boolean_group'] = True; // ?bool | Boolean in group parameters
$associate_array['int64_group'] = 56; // ?int | Integer in group parameters

try {
    $apiInstance->testGroupParameters($associate_array);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->testGroupParameters: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**required_string_group** | **int** | Required String in group parameters |
**required_boolean_group** | **bool** | Required Boolean in group parameters |
**required_int64_group** | **int** | Required Integer in group parameters |
**string_group** | **int&vert;null** | String in group parameters | [optional]
**boolean_group** | **bool&vert;null** | Boolean in group parameters | [optional]
**int64_group** | **int&vert;null** | Integer in group parameters | [optional]

### Return type

void (empty response body)

### Authorization

[bearer_test](../../README.md#bearer_test)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **testInlineAdditionalProperties**

> testInlineAdditionalProperties($request_body)

test inline additionalProperties

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$request_body = array('key' => 'request_body_example'); // array<string,string> | request body

try {
    $apiInstance->testInlineAdditionalProperties($request_body);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->testInlineAdditionalProperties: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**request_body** | **array<string,string>** | request body |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **testJsonFormData**

> testJsonFormData($param, $param2)

test json serialization of form data

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$param = 'param_example'; // string | field1
$param2 = 'param2_example'; // string | field2

try {
    $apiInstance->testJsonFormData($param, $param2);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->testJsonFormData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**param** | **string** | field1 |
**param2** | **string** | field2 |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: Not defined

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

# **testQueryParameterCollectionFormat**

> testQueryParameterCollectionFormat($pipe, $ioutil, $http, $url, $context, $language)


To test the collection format in query parameters

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\FakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$pipe = array('pipe_example'); // string[]
$ioutil = array('ioutil_example'); // string[]
$http = array('http_example'); // string[]
$url = array('url_example'); // string[]
$context = array('context_example'); // string[]
$language = array('key' => 'language_example'); // array<string,string>|null

try {
    $apiInstance->testQueryParameterCollectionFormat($pipe, $ioutil, $http, $url, $context, $language);
} catch (Exception $e) {
    echo 'Exception when calling FakeApi->testQueryParameterCollectionFormat: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
**pipe** | **string[]** |  |
**ioutil** | **string[]** |  |
**http** | **string[]** |  |
**url** | **string[]** |  |
**context** | **string[]** |  |
**language** | **array<string,string>&vert;null** |  | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#top-of-page) [[Back to API list]](../../README.md#api-endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
