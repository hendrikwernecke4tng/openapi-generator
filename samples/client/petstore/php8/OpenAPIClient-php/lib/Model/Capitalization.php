<?php

declare(strict_types=1);

/**
 * Capitalization
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

namespace OpenAPI\Client\Model;

use ArrayAccess;
use JsonException;
use JsonSerializable;
use Psr\Log\InvalidArgumentException;
use OpenAPI\Client\ObjectSerializer;

/**
 * Capitalization Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed
 */
class Capitalization implements ModelInterface, ArrayAccess, JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     */
    protected static string $openAPIModelName = 'Capitalization';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static array $openAPITypes = [
        'small_camel' => 'string',
        'capital_camel' => 'string',
        'small_snake' => 'string',
        'capital_snake' => 'string',
        'sca_eth_flow_points' => 'string',
        'att_name' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static array $openAPIFormats = [
        'small_camel' => null,
        'capital_camel' => null,
        'small_snake' => null,
        'capital_snake' => null,
        'sca_eth_flow_points' => null,
        'att_name' => null,
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     */
    public static function openAPITypes(): array
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     */
    public static function openAPIFormats(): array
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static array $attributeMap = [
        'small_camel' => 'smallCamel',
        'capital_camel' => 'CapitalCamel',
        'small_snake' => 'small_Snake',
        'capital_snake' => 'Capital_Snake',
        'sca_eth_flow_points' => 'SCA_ETH_Flow_Points',
        'att_name' => 'ATT_NAME'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static array $setters = [
        'small_camel' => 'setSmallCamel',
        'capital_camel' => 'setCapitalCamel',
        'small_snake' => 'setSmallSnake',
        'capital_snake' => 'setCapitalSnake',
        'sca_eth_flow_points' => 'setScaEthFlowPoints',
        'att_name' => 'setAttName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static array $getters = [
        'small_camel' => 'getSmallCamel',
        'capital_camel' => 'getCapitalCamel',
        'small_snake' => 'getSmallSnake',
        'capital_snake' => 'getCapitalSnake',
        'sca_eth_flow_points' => 'getScaEthFlowPoints',
        'att_name' => 'getAttName'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     */
    public static function attributeMap(): array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     */
    public static function setters(): array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     */
    public static function getters(): array
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     */
    public function getModelName(): string
    {
        return self::$openAPIModelName;
    }

    /**
     * Associative array for storing property values
     */
    protected array $container = [];

    /**
     * Constructor
     *
     * @param array|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['small_camel'] = $data['small_camel'] ?? null;
        $this->container['capital_camel'] = $data['capital_camel'] ?? null;
        $this->container['small_snake'] = $data['small_snake'] ?? null;
        $this->container['capital_snake'] = $data['capital_snake'] ?? null;
        $this->container['sca_eth_flow_points'] = $data['sca_eth_flow_points'] ?? null;
        $this->container['att_name'] = $data['att_name'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     */
    public function valid(): bool
    {
        return count($this->listInvalidProperties()) === 0;
    }

    /**
     * Gets small_camel
     */
    public function getSmallCamel(): ?string
    {
        return $this->container['small_camel'];
    }

    /**
     * Sets small_camel
     *
     * @param ?string $small_camel small_camel
     *
     * @throws InvalidArgumentException
     */
    public function setSmallCamel(?string $small_camel): static
    {
        $this->container['small_camel'] = $small_camel;

        return $this;
    }

    /**
     * Gets capital_camel
     */
    public function getCapitalCamel(): ?string
    {
        return $this->container['capital_camel'];
    }

    /**
     * Sets capital_camel
     *
     * @param ?string $capital_camel capital_camel
     *
     * @throws InvalidArgumentException
     */
    public function setCapitalCamel(?string $capital_camel): static
    {
        $this->container['capital_camel'] = $capital_camel;

        return $this;
    }

    /**
     * Gets small_snake
     */
    public function getSmallSnake(): ?string
    {
        return $this->container['small_snake'];
    }

    /**
     * Sets small_snake
     *
     * @param ?string $small_snake small_snake
     *
     * @throws InvalidArgumentException
     */
    public function setSmallSnake(?string $small_snake): static
    {
        $this->container['small_snake'] = $small_snake;

        return $this;
    }

    /**
     * Gets capital_snake
     */
    public function getCapitalSnake(): ?string
    {
        return $this->container['capital_snake'];
    }

    /**
     * Sets capital_snake
     *
     * @param ?string $capital_snake capital_snake
     *
     * @throws InvalidArgumentException
     */
    public function setCapitalSnake(?string $capital_snake): static
    {
        $this->container['capital_snake'] = $capital_snake;

        return $this;
    }

    /**
     * Gets sca_eth_flow_points
     */
    public function getScaEthFlowPoints(): ?string
    {
        return $this->container['sca_eth_flow_points'];
    }

    /**
     * Sets sca_eth_flow_points
     *
     * @param ?string $sca_eth_flow_points sca_eth_flow_points
     *
     * @throws InvalidArgumentException
     */
    public function setScaEthFlowPoints(?string $sca_eth_flow_points): static
    {
        $this->container['sca_eth_flow_points'] = $sca_eth_flow_points;

        return $this;
    }

    /**
     * Gets att_name
     */
    public function getAttName(): ?string
    {
        return $this->container['att_name'];
    }

    /**
     * Sets att_name
     *
     * @param ?string $att_name Name of the pet
     *
     * @throws InvalidArgumentException
     */
    public function setAttName(?string $att_name): static
    {
        $this->container['att_name'] = $att_name;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset): mixed
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed $value  Value to be set
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @throws JsonException
     */
    public function __toString(): string
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     */
    public function toHeaderValue(): string
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
