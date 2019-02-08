<?php


namespace Integracommerce\Model;

use Integracommerce\Classes\Collection;
use Integracommerce\Classes\ModelBase;

class MarketplaceStructure extends ModelBase
{
    public static $attributeMap = array(
        'MarketplaceStructures' => [
            "Id" => "string",
            "Name" => "string",
            "ParentId" => "string"
        ],
    );

    /**
     * @var Collection
     */
    public $marketplaceStructures;

    public function __construct(\StdClass $data = null)
    {
        if ($data) {
            $this->page = $data->Page;
            $this->perPage = $data->PerPage;
            $this->total = $data->Total;

            $this->marketplaceStructures = new Collection($data->MarketplaceStructures);
        }
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
}