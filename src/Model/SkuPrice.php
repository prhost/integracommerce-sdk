<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\ModelBase;

class SkuPrice extends ModelBase
{
    public static $attributeMap = [
        "ListPrice" => 0,
        "SalePrice" => 0,
    ];

    /**
     * @var float
     */
    protected $listPrice;

    /**
     * @var float
     */
    protected $salePrice;

    public function __construct(\stdClass $price = null)
    {
        if ($price) {
            $this->setListPrice($price->ListPrice);
            $this->setSalePrice($price->SalePrice);
        }
    }

    /**
     * @return float
     */
    public function getListPrice(): float
    {
        return $this->listPrice;
    }

    /**
     * @param float $listPrice
     */
    public function setListPrice(float $listPrice): void
    {
        $this->listPrice = $listPrice;
    }

    /**
     * @return float
     */
    public function getSalePrice(): float
    {
        return $this->salePrice;
    }

    /**
     * @param float $salePrice
     */
    public function setSalePrice(float $salePrice): void
    {
        $this->salePrice = $salePrice;
    }

    public function toArray()
    {
        return [
            "ListPrice" => $this->getListPrice(),
            "SalePrice" => $this->getSalePrice(),
        ];
    }
}