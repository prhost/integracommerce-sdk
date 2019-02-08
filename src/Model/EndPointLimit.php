<?php


namespace Integracommerce\Model;

use Integracommerce\Classes\Collection;
use Integracommerce\Classes\ModelBase;

class EndPointLimit extends ModelBase
{
    static $attributeMap = [
        'EndPointLimit' => [
            'Name' => 'string',
            'RequestsByMinute' => 'integer',
            'RequestsByHour' => 'integer'
        ]
    ];

    /**
     * @var Collection
     */
    public $endPointLimit;

    public function __construct(array $data)
    {
        $this->endPointLimits = new Collection($data);
    }
}