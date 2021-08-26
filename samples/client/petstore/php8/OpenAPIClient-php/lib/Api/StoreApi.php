<?php

declare(strict_types=1);

/**
 * StoreApi
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
use OpenAPI\Client\Model\Order;

/**
 * StoreApi Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class StoreApi
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
     * Operation deleteOrder
     *
     * Delete purchase order by ID
     *
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors
     *
     * @param string $order_id ID of the order that needs to be deleted (required)
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @throws JsonException
     */
    public function deleteOrder(string $order_id): void
    {
        $this->deleteOrderWithHttpInfo($order_id);
    }

    /**
     * Operation deleteOrderWithHttpInfo
     *
     * Delete purchase order by ID
     *
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors
     *
     * @param string $order_id ID of the order that needs to be deleted (required)
     *
     * @return array array of null, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @throws JsonException
     */
    public function deleteOrderWithHttpInfo(string $order_id): array
    {
        $request = $this->deleteOrderRequest($order_id);

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

            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation deleteOrderAsync
     *
     * Delete purchase order by ID
     *
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors
     *
     * @param string $order_id ID of the order that needs to be deleted (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteOrderAsync(string $order_id): PromiseInterface
    {
        return $this->deleteOrderAsyncWithHttpInfo($order_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteOrderAsyncWithHttpInfo
     *
     * Delete purchase order by ID
     *
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors
     *
     * @param string $order_id ID of the order that needs to be deleted (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteOrderAsyncWithHttpInfo(string $order_id): PromiseInterface
    {
        $returnType = null;
        $request = $this->deleteOrderRequest($order_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'deleteOrder'
     *
     * @param string $order_id ID of the order that needs to be deleted (required)
     *
     * @throws InvalidArgumentException
     */
    public function deleteOrderRequest(string $order_id): Request
    {
        $resourcePath = '/store/order/{order_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'order_id' . '}',
            ObjectSerializer::toPathValue((string)$order_id),
            $resourcePath
        );

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?$query" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getInventory
     *
     * Returns pet inventories by status
     *
     * Returns a map of status codes to quantities
     *
     * @return array<string,int>
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @throws JsonException
     */
    public function getInventory(): array
    {
        [$response] = $this->getInventoryWithHttpInfo();
        return $response;
    }

    /**
     * Operation getInventoryWithHttpInfo
     *
     * Returns pet inventories by status
     *
     * Returns a map of status codes to quantities
     *
     * @return array array of array, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @throws JsonException
     */
    public function getInventoryWithHttpInfo(): array
    {
        $request = $this->getInventoryRequest();

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
                    if ('array' === 'SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'array', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'array';
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
                        'array',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getInventoryAsync
     *
     * Returns pet inventories by status
     *
     * Returns a map of status codes to quantities
     *
     * @throws InvalidArgumentException
     */
    public function getInventoryAsync(): PromiseInterface
    {
        return $this->getInventoryAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getInventoryAsyncWithHttpInfo
     *
     * Returns pet inventories by status
     *
     * Returns a map of status codes to quantities
     *
     * @throws InvalidArgumentException
     */
    public function getInventoryAsyncWithHttpInfo(): PromiseInterface
    {
        $returnType = 'array';
        $request = $this->getInventoryRequest();

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
     * Create request for operation 'getInventory'
     *
     * @throws InvalidArgumentException
     */
    public function getInventoryRequest(): Request
    {
        $resourcePath = '/store/inventory';
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
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
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
        $apiKey = $this->config->getApiKeyWithPrefix('api_key');
        if ($apiKey !== null) {
            $headers['api_key'] = $apiKey;
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
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?$query" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getOrderById
     *
     * Find purchase order by ID
     *
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generated exceptions
     *
     * @param int $order_id ID of pet that needs to be fetched (required)
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @throws JsonException
     */
    public function getOrderById(int $order_id): Order
    {
        [$response] = $this->getOrderByIdWithHttpInfo($order_id);
        return $response;
    }

    /**
     * Operation getOrderByIdWithHttpInfo
     *
     * Find purchase order by ID
     *
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generated exceptions
     *
     * @param int $order_id ID of pet that needs to be fetched (required)
     *
     * @return array array of Order, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @throws JsonException
     */
    public function getOrderByIdWithHttpInfo(int $order_id): array
    {
        $request = $this->getOrderByIdRequest($order_id);

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
                    if (Order::class === 'SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, Order::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = Order::class;
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
                        Order::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getOrderByIdAsync
     *
     * Find purchase order by ID
     *
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generated exceptions
     *
     * @param int $order_id ID of pet that needs to be fetched (required)
     *
     * @throws InvalidArgumentException
     */
    public function getOrderByIdAsync(int $order_id): PromiseInterface
    {
        return $this->getOrderByIdAsyncWithHttpInfo($order_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getOrderByIdAsyncWithHttpInfo
     *
     * Find purchase order by ID
     *
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generated exceptions
     *
     * @param int $order_id ID of pet that needs to be fetched (required)
     *
     * @throws InvalidArgumentException
     */
    public function getOrderByIdAsyncWithHttpInfo(int $order_id): PromiseInterface
    {
        $returnType = Order::class;
        $request = $this->getOrderByIdRequest($order_id);

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
     * Create request for operation 'getOrderById'
     *
     * @param int $order_id ID of pet that needs to be fetched (required)
     *
     * @throws InvalidArgumentException
     */
    public function getOrderByIdRequest(int $order_id): Request
    {
        if ($order_id > 5) {
            throw new InvalidArgumentException('invalid value for "$order_id" when calling StoreApi.getOrderById, must be smaller than or equal to 5.');
        }
        if ($order_id < 1) {
            throw new InvalidArgumentException('invalid value for "$order_id" when calling StoreApi.getOrderById, must be bigger than or equal to 1.');
        }

        $resourcePath = '/store/order/{order_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'order_id' . '}',
            ObjectSerializer::toPathValue((string)$order_id),
            $resourcePath
        );

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/xml', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/xml', 'application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
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
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?$query" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation placeOrder
     *
     * Place an order for a pet
     *
     * @param Order $order order placed for purchasing the pet (required)
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @throws JsonException
     */
    public function placeOrder(Order $order): Order
    {
        [$response] = $this->placeOrderWithHttpInfo($order);
        return $response;
    }

    /**
     * Operation placeOrderWithHttpInfo
     *
     * Place an order for a pet
     *
     * @param Order $order order placed for purchasing the pet (required)
     *
     * @return array array of Order, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     * @throws JsonException
     */
    public function placeOrderWithHttpInfo(Order $order): array
    {
        $request = $this->placeOrderRequest($order);

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
                    if (Order::class === 'SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string)$response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, Order::class, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = Order::class;
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
                        Order::class,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation placeOrderAsync
     *
     * Place an order for a pet
     *
     * @param Order $order order placed for purchasing the pet (required)
     *
     * @throws InvalidArgumentException
     */
    public function placeOrderAsync(Order $order): PromiseInterface
    {
        return $this->placeOrderAsyncWithHttpInfo($order)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation placeOrderAsyncWithHttpInfo
     *
     * Place an order for a pet
     *
     * @param Order $order order placed for purchasing the pet (required)
     *
     * @throws InvalidArgumentException
     */
    public function placeOrderAsyncWithHttpInfo(Order $order): PromiseInterface
    {
        $returnType = Order::class;
        $request = $this->placeOrderRequest($order);

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
     * Create request for operation 'placeOrder'
     *
     * @param Order $order order placed for purchasing the pet (required)
     *
     * @throws InvalidArgumentException
     */
    public function placeOrderRequest(Order $order): Request
    {
        $resourcePath = '/store/order';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/xml', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/xml', 'application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($order)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($order));
            } else {
                $httpBody = $order;
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
            'POST',
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