<?php

namespace shop\helpers;


class StarHelper
{
    public static function drawStar(int $count) :string
    {
        $array = [
            0 => '<i class="admin-star fa fa-fw fa-star-o"></i>',
            1 => '<i class="admin-star fa fa-fw fa-star-o"></i>',
            2 => '<i class="admin-star fa fa-fw fa-star-o"></i>',
            3 => '<i class="admin-star fa fa-fw fa-star-o"></i>',
            4 => '<i class="admin-star fa fa-fw fa-star-o"></i>'

        ];

        for ($i=0;$i<$count;$i++){
            $array[$i] = '<i class="admin-star fa fa-fw fa-star"></i>';
        }
        /*switch ($count){
            case 1:
                return '<i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star-o"></i><i class="fa fa-fw fa-star-o"></i><i class="fa fa-fw fa-star-o"></i><i class="fa fa-fw fa-star-o"></i>';
                break;

            case 2:
                return '<i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star-o"></i><i class="fa fa-fw fa-star-o"></i><i class="fa fa-fw fa-star-o"></i>';
                break;

            case 3:
                return '<i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star-o"></i><i class="fa fa-fw fa-star-o"></i>';

            case 4:
                return '<i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star-o"></i>';
                break;

            case 5:
                return '<span style="color: orange"><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i></span>';
                break;
        } */
        return implode($array);
    }
}