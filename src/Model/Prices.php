<?php


namespace Integracommerce\Model;

use Integracommerce\Classes\Collection;
use Integracommerce\Classes\ModelBase;

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