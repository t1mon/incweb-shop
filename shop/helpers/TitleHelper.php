<?php
namespace shop\helpers;


class TitleHelper
{
    public static function getTitle( string $title): string
    {
        $result = explode(" ", trim($title));
        return is_array($result) ? $result[0] : $title;
    }

}