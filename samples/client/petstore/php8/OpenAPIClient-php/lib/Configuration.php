<?php

declare(strict_types=1);

/**
 * Configuration
 *
 * PHP version 8.0
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * OpenAPI Petstore
 *
 * This spec is mainly for testing Petstore server and contains fake endpoints, models. Please do not use this for any other purpose. Special characters: \" \\
 *
 * The version of the OpenAPI document: 1.0.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.3.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client;

use InvalidArgumentException;

/**
 * Configuration Class Doc Comment
 * PHP version 8.0
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class Configuration
{
    private static ?Configuration $defaultConfiguration;

    /**
     * Associate array to store API key(s)
     *
     * @var string[]
     */
    protected array $apiKeys = [];

    /**
     * Associate array to store API prefix (e.g. Bearer)
     *
     * @var string[]
     */
    protected array $apiKeyPrefixes = [];

    /**
     * Access token for OAuth/Bearer authentication
     */
    protected string $accessToken = '';

    /**
     * Username for HTTP basic authentication
     */
    protected string $username = '';

    /**
     * Password for HTTP basic authentication
     */
    protected string $password = '';

    /**
     * The host
     */
    protected string $host = 'http://petstore.swagger.io:80/v2';

    /**
     * User agent of the HTTP request, set to "OpenAPI-Generator/{version}/PHP" by default
     */
    protected string $userAgent = 'OpenAPI-Generator/1.0.0/PHP';

    /**
     * Debug switch (default set to false)
     */
    protected bool $debug = false;

    /**
     * Debug file location (log to STDOUT by default)
     */
    protected string $debugFile = 'php://output';

    /**
     * Debug file location (log to STDOUT by default)
     */
    protected string $tempFolderPath;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
    }

    /**
     * Sets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $key API key or token
     */
    public function setApiKey(string $apiKeyIdentifier, string $key): static
    {
        $this->apiKeys[$apiKeyIdentifier] = $key;
        return $this;
    }

    /**
     * Gets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     */
    public function getApiKey(string $apiKeyIdentifier): ?string
    {
        return $this->apiKeys[$apiKeyIdentifier] ?? null;
    }

    /**
     * Sets the prefix for API key (e.g. Bearer)
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $prefix API key prefix, e.g. Bearer
     */
    public function setApiKeyPrefix(string $apiKeyIdentifier, string $prefix): static
    {
        $this->apiKeyPrefixes[$apiKeyIdentifier] = $prefix;
        return $this;
    }

    /**
     * Gets API key prefix
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     */
    public function getApiKeyPrefix(string $apiKeyIdentifier): ?string
    {
        return $this->apiKeyPrefixes[$apiKeyIdentifier] ?? null;
    }

    /**
     * Sets the access token for OAuth
     *
     * @param string $accessToken Token for OAuth
     */
    public function setAccessToken(string $accessToken): static
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * Gets the access token for OAuth
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Sets the username for HTTP basic authentication
     *
     * @param string $username Username for HTTP basic authentication
     */
    public function setUsername(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Gets the username for HTTP basic authentication
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Sets the password for HTTP basic authentication
     *
     * @param string $password Password for HTTP basic authentication
     */
    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Gets the password for HTTP basic authentication
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Sets the host
     *
     * @param string $host Host
     */
    public function setHost(string $host): static
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Gets the host
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Sets the user agent of the api client
     *
     * @param string $userAgent the user agent of the api client
     *
     * @throws InvalidArgumentException
     */
    public function setUserAgent(string $userAgent): static
    {
        if (!is_string($userAgent)) {
            throw new InvalidArgumentException('User-agent must be a string.');
        }

        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * Gets the user agent of the api client
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     */
    public function setDebug(bool $debug): static
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * Gets the debug flag
     */
    public function getDebug(): bool
    {
        return $this->debug;
    }

    /**
     * Sets the debug file
     *
     * @param string $debugFile Debug file
     */
    public function setDebugFile(string $debugFile): static
    {
        $this->debugFile = $debugFile;
        return $this;
    }

    /**
     * Gets the debug file
     */
    public function getDebugFile(): string
    {
        return $this->debugFile;
    }

    /**
     * Sets the temp folder path
     *
     * @param string $tempFolderPath Temp folder path
     */
    public function setTempFolderPath(string $tempFolderPath): static
    {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }

    /**
     * Gets the temp folder path
     */
    public function getTempFolderPath(): string
    {
        return $this->tempFolderPath;
    }

    /**
     * Gets the default configuration instance
     */
    public static function getDefaultConfiguration(): Configuration
    {
        if (self::$defaultConfiguration === null) {
            self::$defaultConfiguration = new Configuration();
        }

        return self::$defaultConfiguration;
    }

    /**
     * Sets the default configuration instance
     *
     * @param Configuration $config An instance of the Configuration Object
     */
    public static function setDefaultConfiguration(Configuration $config): void
    {
        self::$defaultConfiguration = $config;
    }

    /**
     * Gets the essential information for debugging
     */
    public static function toDebugReport(): string
    {
        $report = 'PHP SDK (OpenAPI\Client) Debug Report:' . PHP_EOL;
        $report .= '    OS: ' . php_uname() . PHP_EOL;
        $report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
        $report .= '    The version of the OpenAPI document: 1.0.0' . PHP_EOL;
        $report .= '    Temp Folder Path: ' . self::getDefaultConfiguration()->getTempFolderPath() . PHP_EOL;

        return $report;
    }

    /**
     * Get API key (with prefix if set)
     *
     * @param string $apiKeyIdentifier name of apikey
     */
    public function getApiKeyWithPrefix(string $apiKeyIdentifier): ?string
    {
        $prefix = $this->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->getApiKey($apiKeyIdentifier);

        if ($apiKey === null) {
            return null;
        }

        if ($prefix === null) {
            $keyWithPrefix = $apiKey;
        } else {
            $keyWithPrefix = $prefix . ' ' . $apiKey;
        }

        return $keyWithPrefix;
    }

    /**
     * Returns an array of host settings
     */
    public function getHostSettings(): array
    {
        return [
            [
                "url" => "http://{server}.swagger.io:{port}/v2",
                "description" => "petstore server",
                "variables" => [
                    "server" => [
                        "description" => "No description provided",
                        "default_value" => "petstore",
                        "enum_values" => [
                            "petstore",
                            "qa-petstore",
                            "dev-petstore"
                        ]
                    ],
                    "port" => [
                        "description" => "No description provided",
                        "default_value" => "80",
                        "enum_values" => [
                            "80",
                            "8080"
                        ]
                    ]
                ]
            ],
            [
                "url" => "https://localhost:8080/{version}",
                "description" => "The local server",
                "variables" => [
                    "version" => [
                        "description" => "No description provided",
                        "default_value" => "v2",
                        "enum_values" => [
                            "v1",
                            "v2"
                        ]
                    ]
                ]
            ],
            [
                "url" => "https://127.0.0.1/no_varaible",
                "description" => "The local server without variables",
            ]
        ];
    }

    /**
     * Returns URL based on the index and variables
     *
     * @param int $index index of the host settings
     * @param array|null $variables hash of variable and the corresponding value (optional)
     */
    public function getHostFromSettings(int $index, ?array $variables = null): string
    {
        if (null === $variables) {
            $variables = [];
        }

        $hosts = $this->getHostSettings();

        // check array index out of bound
        if ($index < 0 || $index >= sizeof($hosts)) {
            throw new InvalidArgumentException(
                "Invalid index $index when selecting the host. Must be less than " . sizeof($hosts)
            );
        }

        $host = $hosts[$index];
        $url = $host["url"];

        // go through variable and assign a value
        foreach ($host["variables"] ?? [] as $name => $variable) {
            if (array_key_exists($name, $variables)) { // check to see if it's in the variables provided by the user
                if (in_array(
                        $variables[$name],
                        $variable["enum_values"],
                        true
                    )) { // check to see if the value is in the enum
                        $url = str_replace("{" . $name . "}", $variables[$name], $url);
                } else {
                    throw new InvalidArgumentException(
                        "The variable `$name` in the host URL has invalid value ".$variables[$name].". Must be ".join(
                            ',',
                            $variable["enum_values"]
                        ) . ".");
                }
            } else {
                // use default value
                $url = str_replace("{" . $name . "}", $variable["default_value"], $url);
            }
        }

        return $url;
    }
}
