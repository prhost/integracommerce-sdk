<?php

namespace Integracommerce\Classes;


abstract class ModelBase
{
    protected static $attributeMap = [];

    /**
     * @return array
     */
    public static function getAttributeMap(): array
    {
        return self::$attributeMap;
    }

    /**
     * @param array $attributeMap
     */
    public static function setAttributeMap(array $attributeMap): void
    {
        self::$attributeMap = $attributeMap;
    }
}