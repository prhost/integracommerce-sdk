<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;
use IntegraCommerce\Traits\Paginable;

class Attributes extends ModelBase
{
    use Paginable;

    public static $attributeMap = [
        'Attributes' => [
            "Name" => "string",
        ],
    ];

    /**
     * @var Collection[Attribute]
     */
    public $attributes;

    public function __construct(\StdClass $attributes = null)
    {
        $this->attributes = new Collection();

        if ($attributes) {
            $this->page = $attributes->Page;
            $this->perPage = $attributes->PerPage;
            $this->total = $attributes->Total;

            foreach ($attributes->Attributes as $attribute) {
                $this->attributes->push(new Attribute($attribute));
            }
        }
    }

    /**
     * @return Collection
     */
    public function getAttributes(): Collection
    {
        return $this->attributes;
    }

    /**
     * @param Collection $attributes
     */
    public function setAttributes(Collection $attributes): void
    {
        $this->attributes = $attributes;
    }

    public function setAttribute(Attribute $attribute)
    {
        if (null === $this->attributes) {
            $this->attributes = new Collection();
        }

        $this->attributes->push($attribute);
    }
}