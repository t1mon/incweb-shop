<?php
namespace shop\helpers;


class ProductStingHelper
{

    public static function cropName(string $str, $maxLength):string
    {
        return mb_strimwidth($str, 0, $maxLength, "...");
    }
}