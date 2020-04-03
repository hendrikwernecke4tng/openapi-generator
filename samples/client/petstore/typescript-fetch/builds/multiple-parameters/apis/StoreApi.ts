/* tslint:disable */
/* eslint-disable */
/**
 * OpenAPI Petstore
 * This is a sample server Petstore server. For this sample, you can use the api key `special-key` to test the authorization filters.
 *
 * The version of the OpenAPI document: 1.0.0
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


import * as runtime from '../runtime';
import {
    Order,
    OrderFromJSON,
    OrderToJSON,
} from '../models';

export interface DeleteOrderRequest {
    orderId: string;
}

export interface GetOrderByIdRequest {
    orderId: number;
}

export interface PlaceOrderRequest {
    body: Order;
}

/**
 * no description
 */
export class StoreApi extends runtime.BaseAPI {

    /**
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors
     * Delete purchase order by ID
     */
    async deleteOrderRaw(requestParameters: DeleteOrderRequest): Promise<runtime.ApiResponse<void>> {
        if (requestParameters.orderId === null || requestParameters.orderId === undefined) {
            throw new runtime.RequiredError('orderId','Required parameter requestParameters.orderId was null or undefined when calling deleteOrder.');
        }

        const queryParameters: runtime.HTTPQuery = {};

        const headerParameters: runtime.HTTPHeaders = {};

        const response = await this.request({
            path: `/store/order/{orderId}`.replace(`{${"orderId"}}`, encodeURIComponent(String(requestParameters.orderId))),
            method: 'DELETE',
            headers: headerParameters,
            query: queryParameters,
        });

        return new runtime.VoidApiResponse(response);
    }

    /**
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors
     * Delete purchase order by ID
     */
    async deleteOrder(orderId: string): Promise<void> {
        await this.deleteOrderRaw({ orderId: orderId });
    }

    /**
     * Returns a map of status codes to quantities
     * Returns pet inventories by status
     */
    async getInventoryRaw(): Promise<runtime.ApiResponse<{ [key: string]: number; }>> {
        const queryParameters: runtime.HTTPQuery = {};

        const headerParameters: runtime.HTTPHeaders = {};

        if (this.configuration && this.configuration.apiKey) {
            headerParameters["api_key"] = this.configuration.apiKey("api_key"); // api_key authentication
        }

        const response = await this.request({
            path: `/store/inventory`,
            method: 'GET',
            headers: headerParameters,
            query: queryParameters,
        });

        return new runtime.JSONApiResponse<any>(response);
    }

    /**
     * Returns a map of status codes to quantities
     * Returns pet inventories by status
     */
    async getInventory(): Promise<{ [key: string]: number; }> {
        const response = await this.getInventoryRaw();
        return await response.value();
    }

    /**
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generated exceptions
     * Find purchase order by ID
     */
    async getOrderByIdRaw(requestParameters: GetOrderByIdRequest): Promise<runtime.ApiResponse<Order>> {
        if (requestParameters.orderId === null || requestParameters.orderId === undefined) {
            throw new runtime.RequiredError('orderId','Required parameter requestParameters.orderId was null or undefined when calling getOrderById.');
        }

        const queryParameters: runtime.HTTPQuery = {};

        const headerParameters: runtime.HTTPHeaders = {};

        const response = await this.request({
            path: `/store/order/{orderId}`.replace(`{${"orderId"}}`, encodeURIComponent(String(requestParameters.orderId))),
            method: 'GET',
            headers: headerParameters,
            query: queryParameters,
        });

        return new runtime.JSONApiResponse(response, (jsonValue) => OrderFromJSON(jsonValue));
    }

    /**
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generated exceptions
     * Find purchase order by ID
     */
    async getOrderById(orderId: number): Promise<Order> {
        const response = await this.getOrderByIdRaw({ orderId: orderId });
        return await response.value();
    }

    /**
     * Place an order for a pet
     */
    async placeOrderRaw(requestParameters: PlaceOrderRequest): Promise<runtime.ApiResponse<Order>> {
        if (requestParameters.body === null || requestParameters.body === undefined) {
            throw new runtime.RequiredError('body','Required parameter requestParameters.body was null or undefined when calling placeOrder.');
        }

        const queryParameters: runtime.HTTPQuery = {};

        const headerParameters: runtime.HTTPHeaders = {};

        headerParameters['Content-Type'] = 'application/json';

        const response = await this.request({
            path: `/store/order`,
            method: 'POST',
            headers: headerParameters,
            query: queryParameters,
            body: OrderToJSON(requestParameters.body),
        });

        return new runtime.JSONApiResponse(response, (jsonValue) => OrderFromJSON(jsonValue));
    }

    /**
     * Place an order for a pet
     */
    async placeOrder(body: Order): Promise<Order> {
        const response = await this.placeOrderRaw({ body: body });
        return await response.value();
    }

}