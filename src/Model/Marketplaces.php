<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;
use IntegraCommerce\Traits\Paginable;

class Marketplaces extends ModelBase
{
    use Paginable;

    static $attributeMap = [
        'Marketplaces' => [
            'Name' => 'string',
        ]
    ];

    /**
     * @var Collection[Marketplace]
     */
    public $marketplaces;

    public function __construct(\StdClass $marketplaces = null)
    {
        $this->marketplaces = new Collection();

        if ($marketplaces) {
            $this->page = $marketplaces->Page;
            $this->perPage = $marketplaces->PerPage;
            $this->total = $marketplaces->Total;

            foreach ($marketplaces->Marketplaces as $marketplace) {
                $this->marketplaces->push(new Marketplace($marketplace));
            }
        }
    }

    /**
     * @return Collection
     */
    public function getMarketplaces(): Collection
    {
        return $this->marketplaces;
    }

    /**
     * @param Collection $marketplaces
     */
    public function setMarketplaces(Collection $marketplaces): void
    {
        $this->marketplaces = $marketplaces;
    }

    public function setMarketplace(Marketplace $marketplace)
    {
        if (null === $this->marketplaces) {
            $this->marketplaces = new Collection();
        }

        $this->marketplaces->push($marketplace);
    }
}