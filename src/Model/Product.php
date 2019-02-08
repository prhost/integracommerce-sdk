<?php


namespace Integracommerce\Model;

use Integracommerce\Classes\Collection;
use Integracommerce\Classes\ModelBase;

class Product extends ModelBase
{
    public static $attributeMap = [
        "IdProduct"             => "string",
        "Name"                  => "string",
        "Code"                  => "string",
        "Brand"                 => "string",
        "NbmOrigin"             => "integer",
        "NbmNumber"             => "integer",
        "WarrantyTime"          => "integer",
        "Active"                => "boolean",
        "Categories"            => [
            "Id"       => "string",
            "Name"     => "string",
            "ParentId" => "string"
        ],
        "MarketplaceStructures" => [
            [
                "Id"       => "string",
                "Name"     => "string",
                "ParentId" => "string"
            ]
        ],
        "Attributes"            => [
            [
                "Name"  => "string",
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
     * Origem da Mercadoria (0 - Nacional e 1 - Importada)
     *
     * @var bool
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

    public function __construct(\stdClass $product = null)
    {
        if ($product) {
            $this->setIdProduct($product->IdProduct);
            $this->setName($product->Name);
            $this->setCode($product->Code);
            $this->setBrand($product->Brand);
            $this->setNbmNumber((string)$product->NbmNumber);
            $this->setWarrantyTime((int)$product->WarrantyTime);
            $this->setActive($product->Active);

            foreach ($product->Categories as $category) {
                $categoryModel = new \Integracommerce\Model\Category();
                $categoryModel->setId($category->Id);
                $categoryModel->setName($category->Name);
                $categoryModel->setParentId((int)$category->ParentId);
                $categories[] = $categoryModel;
            }
            $this->setCategories(new Collection($categories));

            $marketplaceStructures = new Collection();
            $marketplaceStructureModel = new MarketplaceStructure();
            $marketplaceStructureModel->setMarketplaceStructures($marketplaceStructures);
            $this->setMarketplaceStructures($marketplaceStructures);

            $this->setAttributes(new Collection());
        }
    }

    /**
     * @return string
     */
    public function getIdProduct(): string
    {
        return $this->idProduct;
    }

    /**
     * @param string $idProduct
     */
    public function setIdProduct(string $idProduct): void
    {
        $this->idProduct = $idProduct;
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

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getNbmOrigin(): string
    {
        return $this->nbmOrigin;
    }

    /**
     * Origem da Mercadoria (0 - Nacional e 1 - Importada)
     *
     * @param bool $nbmOrigin
     */
    public function setNbmOrigin(bool $nbmOrigin): void
    {
        $this->nbmOrigin = $nbmOrigin;
    }

    /**
     * @return string
     */
    public function getNbmNumber(): string
    {
        return $this->nbmNumber;
    }

    /**
     * @param string $nbmNumber
     */
    public function setNbmNumber(string $nbmNumber): void
    {
        $this->nbmNumber = $nbmNumber;
    }

    /**
     * @return string
     */
    public function getWarrantyTime(): string
    {
        return $this->warrantyTime;
    }

    /**
     * @param string $warrantyTime
     */
    public function setWarrantyTime(string $warrantyTime): void
    {
        $this->warrantyTime = $warrantyTime;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    /**
     * @param Collection $categories
     */
    public function setCategories(Collection $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return Collection
     */
    public function getMarketplaceStructures(): Collection
    {
        return $this->marketplaceStructures;
    }

    /**
     * @param Collection $marketplaceStructures
     */
    public function setMarketplaceStructures(Collection $marketplaceStructures): void
    {
        $this->marketplaceStructures = $marketplaceStructures;
    }

    /**
     * @return Collection
     */
    public function getAttributes(): Collection
    {
        return $this->attributes;
    }

    /**
     * @param Collection $attributes
     */
    public function setAttributes(Collection $attributes): void
    {
        $this->attributes = $attributes;
    }
}