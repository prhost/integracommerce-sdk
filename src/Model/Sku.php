<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;

class Sku extends ModelBase
{
    public static $attributeMap = [
        "IdSku"         => "string",
        "IdSkuErp"      => "string",
        "IdProduct"     => "string",
        "Name"          => "string",
        "Description"   => "string",
        "Height"        => 0,
        "Width"         => 0,
        "Length"        => 0,
        "Weight"        => 0,
        "CodeEan"       => "string",
        "CodeNcm"       => "string",
        "CodeIsbn"      => "string",
        "CodeNbm"       => "string",
        "Variation"     => "string",
        "Status"        => true,
        "Price"         => [
            "ListPrice" => 0,
            "SalePrice" => 0
        ],
        "StockQuantity" => 0,
        "MainImageUrl"  => "string",
        "UrlImages"     => [
            "string"
        ],
        "Attributes"    => [
            [
                "Name"  => "string",
                "Value" => "string"
            ]
        ]
    ];

    public function __construct(\StdClass $sku = null)
    {
        if ($sku) {
            $this->setIdSku($sku->IdSku);
            $this->setIdSkupErp($sku->IdSkuErp);
            $this->setName($sku->Name);
            $this->setDescription($sku->Description);
            $this->setHeight($sku->Height);
            $this->setWidth($sku->Width);
            $this->setLength($sku->Length);
            $this->setWeight($sku->Weight);
            $this->setCodeEan($sku->CodeEan);
            $this->setCodeNcm($sku->CodeNcm);
            $this->setCodeIsbn($sku->CodeIsbn);
            $this->setCodeNbm($sku->CodeNbm);
            $this->setVariation($sku->Variation);
            $this->setStatus($sku->Status);

            $skuPrice = new SkuPrice($sku->Price);
            $this->setPrice($skuPrice);

            $this->setStockQuantity($sku->StockQuantity);
            $this->setMainImageUrl((string)$sku->MainImageUrl);
            $this->setUrlImages($sku->UrlImages);
            $this->setAttributes(new Collection());
        }
    }

    /**
     * @var string
     */
    protected $idSku = '';

    /**
     * @var string
     */
    protected $idSkupErp = '';

    /**
     * @var string
     */
    protected $idProduct = '';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var int
     */
    protected $height = 0;

    /**
     * @var int
     */
    protected $width = 0;

    /**
     * @var int
     */
    protected $length = 0;

    /**
     * @var int
     */
    protected $weight = 0;

    /**
     * @var int
     */
    protected $codeEan;

    /**
     * @var string
     */
    protected $codeNcm = '';

    /**
     * @var string
     */
    protected $codeIsbn = '';

    /**
     * @var string
     */
    protected $codeNbm = '';

    /**
     * @var string
     */
    protected $variation = '';

    /**
     * @var bool
     */
    protected $status = true;

    /**
     * @var SkuPrice
     */
    protected $price;

    /**
     * @var int
     */
    protected $stockQuantity;

    /**
     * @var string
     */
    protected $mainImageUrl = '';

    /**
     * @var array
     */
    protected $urlImages = [];

    /**
     * @var Collection[Attributes]
     */
    protected $attributes;

    /**
     * @return string
     */
    public function getIdSku(): string
    {
        return $this->idSku;
    }

    /**
     * @param string $idSku
     */
    public function setIdSku(string $idSku): void
    {
        $this->idSku = $idSku;
    }

    /**
     * @return string
     */
    public function getIdSkupErp(): string
    {
        return $this->idSkupErp;
    }

    /**
     * @param string $idSkupErp
     */
    public function setIdSkupErp(string $idSkupErp): void
    {
        $this->idSkupErp = $idSkupErp;
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getCodeEan(): int
    {
        return $this->codeEan;
    }

    /**
     * @param int $codeEan
     */
    public function setCodeEan(int $codeEan): void
    {
        $this->codeEan = $codeEan;
    }

    /**
     * @return string
     */
    public function getCodeNcm(): string
    {
        return $this->codeNcm;
    }

    /**
     * @param string $codeNcm
     */
    public function setCodeNcm(string $codeNcm): void
    {
        $this->codeNcm = $codeNcm;
    }

    /**
     * @return string
     */
    public function getCodeIsbn(): string
    {
        return $this->codeIsbn;
    }

    /**
     * @param string $codeIsbn
     */
    public function setCodeIsbn(string $codeIsbn): void
    {
        $this->codeIsbn = $codeIsbn;
    }

    /**
     * @return string
     */
    public function getCodeNbm(): string
    {
        return $this->codeNbm;
    }

    /**
     * @param string $codeNbm
     */
    public function setCodeNbm(string $codeNbm): void
    {
        $this->codeNbm = $codeNbm;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    /**
     * @return SkuPrice
     */
    public function getPrice(): SkuPrice
    {
        return $this->price;
    }

    /**
     * @param SkuPrice $price
     */
    public function setPrice(SkuPrice $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getStockQuantity(): int
    {
        return $this->stockQuantity;
    }

    /**
     * @param int $stockQuantity
     */
    public function setStockQuantity(int $stockQuantity): void
    {
        $this->stockQuantity = $stockQuantity;
    }

    /**
     * @return string
     */
    public function getMainImageUrl(): string
    {
        return $this->mainImageUrl;
    }

    /**
     * @param string $mainImageUrl
     */
    public function setMainImageUrl(string $mainImageUrl): void
    {
        $this->mainImageUrl = $mainImageUrl;
    }

    /**
     * @return array
     */
    public function getUrlImages(): array
    {
        return $this->urlImages;
    }

    /**
     * @param array $urlImages
     */
    public function setUrlImages(array $urlImages): void
    {
        $this->urlImages = $urlImages;
    }

    /**
     * @return Collection
     */
    public function getAttributes(): Collection
    {
        return $this->attributes ? $this->attributes : new Collection();
    }

    /**
     * @param Collection $attributes
     */
    public function setAttributes(Collection $attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function getVariation(): string
    {
        return $this->variation;
    }

    /**
     * @param string $variation
     */
    public function setVariation(string $variation): void
    {
        $this->variation = $variation;
    }
}