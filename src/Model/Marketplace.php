<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;

class Marketplace extends ModelBase
{
    static $attributeMap = array(
        'Marketplaces' => [
            'Name' => 'string',
        ]
    );

    /**
     * @var Collection
     */
    public $marketplaces;

    public function __construct(\StdClass $marketplaces)
    {
        $this->marketplaces = new Collection($marketplaces->Marketplaces);
    }
}