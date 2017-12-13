<?php
namespace shop\helpers;


class TitleHelper

{
    public static function getTitle( array $array):string
    {
        return is_string(end($array)) ? end($array) : '';
    }

}