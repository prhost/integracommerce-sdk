<?php

namespace IntegraCommerce\Classes;


abstract class ModelBase implements \ArrayAccess
{
    /**
     * @var int
     */
    public $page;

    /**
     * @var int
     */
    public $perPage;

    /**
     * @var int
     */
    public $total;

    public static $attributeMap = [];

    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
}