<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;

class Attribute extends ModelBase
{
    public static $attributeMap = array(
        'Attributes' => [
            "Name" => "string",
        ],
    );

    /**
     * @var Collection
     */
    public $attributes;

    public function __construct(\StdClass $data)
    {
        $this->page = $data->Page;
        $this->perPage = $data->PerPage;
        $this->total = $data->Total;

        $this->attributes = new Collection($data->Attributes);
    }
}