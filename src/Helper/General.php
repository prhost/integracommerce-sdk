<?php

namespace IntegraCommerce\Helper;


class General
{
    public static function convertStringToFloat($value = ''): float
    {
        $value = str_replace(',', '.', $value);
        return (float)preg_replace("/[^-0-9\.]/", "", $value);
    }
}