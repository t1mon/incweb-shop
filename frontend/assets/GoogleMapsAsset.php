<?php
/**
 * Created by PhpStorm.
 * User: t1mon
 * Date: 11.12.2017
 * Time: 22:59
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class GoogleMapsAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $js = [
        'https://maps.google.com/maps/api/js?key=AIzaSyCqa5xX1X-7EQ_UtEiXwl9UhJOoV9cwKNs&sensor=false',
        '//vk.com/js/api/openapi.js?150',
    ];

}