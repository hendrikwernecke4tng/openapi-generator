<?php

declare(strict_types=1);

/**
 * FakeClassnameTags123Api
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

namespace OpenAPI\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Utils;
use InvalidArgumentException;
use JsonException;
use RuntimeException;
use stdClass;
use OpenAPI\Client\ApiException;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\HeaderSelector;
use OpenAPI\Client\ObjectSerializer;
use OpenAPI\Client\Model\Client;

/**
 * FakeClassnameTags123Api Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class FakeClassnameTags123Api
{
    protected ClientInterface $client;
    protected Configuration $config;
    protected HeaderSelector $headerSelector;
    protected int $hostIndex;

    /**
     * @param ClientInterface|null $client
     * @param Configuration|null $config
     * @param HeaderSelector|null $selector
     * @param int $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        int $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex(int $hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     */
    public function getHostIndex(): int
    {
        return $this->hostIndex;
    }

    public function getConfig(): Configuration
    {
        return $this->config;
    }

    /**
     * Operation testClassname
     *
     * To test class name in snake case
     *
     * To test class name in snake case
     *
     * @param Client $client client model (required)
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @throws JsonException
     */
    public function testClassname(Client $client): Client
    {
        [$response] = $this->testClassnameWithHttpInfo($client);
        return $response;
    }

    /**
     * Operation testClassnameWithHttpInfo
     *
     * To test class name in snake case
     *
     * To test class name in snake case
     *
     * @param Client $client client model (required)
     *
     * @return array array of Client, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @throws JsonException
     */
    public function testClassnameWithHttpInfo(Client $client): array
    {
        $request = $this->testClassnameRequest($client);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int)$e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string)$e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string)$request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string)$response->getBody()
                );
            }

            switch ($statusCode) {
                case 200:
                    if (Client::class === 'SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, Client::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = Client::class;
            $responseBody = $response->getBody();
            if ($returnType === 'SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string)$responseBody;
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        Client::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation testClassnameAsync
     *
     * To test class name in snake case
     *
     * To test class name in snake case
     *
     * @param Client $client client model (required)
     *
     * @throws InvalidArgumentException
     */
    public function testClassnameAsync(Client $client): PromiseInterface
    {
        return $this->testClassnameAsyncWithHttpInfo($client)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation testClassnameAsyncWithHttpInfo
     *
     * To test class name in snake case
     *
     * To test class name in snake case
     *
     * @param Client $client client model (required)
     *
     * @throws InvalidArgumentException
     */
    public function testClassnameAsyncWithHttpInfo(Client $client): PromiseInterface
    {
        $returnType = Client::class;
        $request = $this->testClassnameRequest($client);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === 'SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string)$responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string)$response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'testClassname'
     *
     * @param Client $client client model (required)
     *
     * @throws InvalidArgumentException
     */
    public function testClassnameRequest(Client $client): Request
    {
        $resourcePath = '/fake_classname_test';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($client)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($client));
            } else {
                $httpBody = $client;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = http_build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('api_key_query');
        if ($apiKey !== null) {
            $queryParams['api_key_query'] = $apiKey;
        }
        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = http_build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?$query" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @return array of http client options
     *
     * @throws RuntimeException on file opening failure
     */
    protected function createHttpClientOption(): array
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'ab');
            if (!$options[RequestOptions::DEBUG]) {
                throw new RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
