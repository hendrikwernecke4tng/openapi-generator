# OpenAPI\Client\Api\AnotherFakeApi <a id="top-of-page"></a>

All URIs are relative to *http://petstore.swagger.io:80/v2*.

Method | HTTP request | Description
------------- | ------------- | -------------
[**call123TestSpecialTags**](AnotherFakeApi.md#call123testspecialtags) | **PATCH** /another-fake/dummy | To test special tags

# **call123TestSpecialTags**

> call123TestSpecialTags($client): Client

To test special tags
To test special tags and operation ID starting with number

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new OpenAPI\Client\Api\AnotherFakeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$client = new Client(); // Client | client model

try {
    $result = $apiInstance->call123TestSpecialTags($client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AnotherFakeApi->call123TestSpecialTags: ', $e->getMessage(), PHP_EOL;
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
