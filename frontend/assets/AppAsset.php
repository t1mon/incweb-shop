<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic',
        '//fonts.googleapis.com/css?family=Montserrat:400,700',
        '//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css',
        //'//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css',
        'css/font-awesome.min.css',
        'css/main.css',
        'css/style.css',
        'css/responsive.css',
        'css/animate.css',
        'css/custom.css',
        'rs-plugin/css/settings.css',
    ];
    public $js = [
        //'//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
        //'js/jqueryMy.js',
        //'js/jquery-1.11.3.js',
        '//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js',
        'js/jquery.elevatezoom.js',
        //'js/modernizr.js',
        'js/bootstrap.min.js',
        'js/wow.min.js',
        'js/own-menu.js',
        'js/owl.carousel.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.nouislider.min.js',
        'js/jquery.flexslider-min.js',
        'js/jquery.isotope.min.js',
        'rs-plugin/js/jquery.themepunch.tools.min.js',
        'rs-plugin/js/jquery.themepunch.revolution.min.js',
        'js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
       // 'frontend\assets\FontAwesomeAsset',

    ];
}
