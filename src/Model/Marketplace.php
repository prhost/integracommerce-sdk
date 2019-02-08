<?php


namespace Integracommerce\Model;

use Integracommerce\Classes\ModelBase;

class Marketplace extends ModelBase
{
    static $attributeMap = [
        'Name' => 'string',
    ];

    /**
     * @var string
     */
    public $name;

    public function __construct(\StdClass $marketplace = null)
    {
        if ($marketplace) {
            $this->name = $marketplace->Name;
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}