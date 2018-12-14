<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;

class Prices extends ModelBase
{
    public static $attributeMap = [
        [
            "IdSku"     => "string",
            "ListPrice" => 0,
            "SalePrice" => 0
        ]
    ];

    /**
     * @var Collection
     */
    protected $prices;

    public function __construct(array $prices = [])
    {
        $this->setPrices(new Collection($prices));
    }

    /**
     * @return Collection[Price]
     */
    public function getPrices(): Collection
    {
        return $this->prices;
    }

    /**
     * @param Collection[Price] $prices
     */
    public function setPrices(Collection $prices): void
    {
        $this->prices = $prices;
    }
}