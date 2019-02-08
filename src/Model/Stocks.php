<?php


namespace Integracommerce\Model;

use Integracommerce\Classes\Collection;
use Integracommerce\Classes\ModelBase;

class Stocks extends ModelBase
{
    public static $attributeMap = [
        [
            "idSku"    => "string",
            "Quantity" => 0
        ]
    ];

    /**
     * @var Collection
     */
    protected $stocks;

    public function __construct(array $stocks = [])
    {
        if ($stocks) {
            $this->stocks = new Collection($stocks);
        }
    }

    /**
     * @return Collection
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    /**
     * @param Collection $stocks
     */
    public function setStocks(Collection $stocks): void
    {
        $this->stocks = $stocks;
    }
}