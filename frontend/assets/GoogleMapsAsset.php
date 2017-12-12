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
        'https://maps.google.com/maps/api/js?key=AIzaSyDQrr4p0PSxepzBsPIYeSmeAQt6UTWn5bE',
        '//vk.com/js/api/openapi.js?150',
    ];

}