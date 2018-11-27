<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;

class Product extends ModelBase
{
    public static $attributeMap = [
        "IdProduct" => "string",
        "Name" => "string",
        "Code" => "string",
        "Brand" => "string",
        "NbmOrigin" => "integer",
        "NbmNumber" => "integer",
        "WarrantyTime" => "integer",
        "Active" => "boolean",
        "Categories" => [
            "Id" => "string",
            "Name" => "string",
            "ParentId" => "string"
        ],
        "MarketplaceStructures" => [
            [
                "Id" => "string",
                "Name" => "string",
                "ParentId" => "string"
            ]
        ],
        "Attributes" => [
            [
                "Name" => "string",
                "Value" => "string"
            ]
        ]
    ];

    /**
     * @var string
     */
    protected $idProduct;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var
     */
    protected $code;

    /**
     * @var string
     */
    protected $brand;

    /**
     * @var string
     */
    protected $nbmOrigin;

    /**
     * @var string
     */
    protected $nbmNumber;

    /**
     * @var string
     */
    protected $warrantyTime;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var Collection[Category]
     */
    protected $categories;

    /**
     * @var Collection[MarketplaceStructures]
     */
    protected $marketplaceStructures;

    /**
     * @var Collection[Attributes]
     */
    protected $attributes;

    public function __construct()
    {

    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}