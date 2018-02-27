<?php

namespace shop\helpers;

class PriceHelper
{
    public static function format($price): string
    {
        return number_format($price, 0, '.', ' ');
    }

    public static function percent ($new_price, $old_price) : string
    {
        if( $old_price>$new_price) {
            $percent = (($new_price / $old_price ) * 100) ;
            return round($percent);
        }else{
            return false;
        }
    }
} 