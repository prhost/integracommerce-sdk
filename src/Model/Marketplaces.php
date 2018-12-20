<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;
use IntegraCommerce\Traits\Paginable;

class Marketplaces extends ModelBase
{
    static $attributeMap = [
        'Marketplaces' => [
            'Name' => 'string',
        ]
    ];

    /**
     * @var Collection[Marketplace]
     */
    protected $marketplaces;

    public function __construct(\StdClass $marketplaces = null)
    {
        $this->marketplaces = new Collection();

        if ($marketplaces) {
            foreach ($marketplaces->Marketplaces as $marketplace) {
                $this->marketplaces->push(new Marketplace($marketplace));
            }
        }
    }

    /**
     * @return Collection[Marketplace]
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