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
        'css/main.css',
        'css/style.css',
        'css/responsive.css',
        'css/animate.css',
        'css/custom.css',
        'rs-plugin/css/settings.css',
    ];
    public $js = [
        //'js/common.js',
        'js/modernizr.js',
        'js/wow.min.js',
        'js/own-menu.js',
        'js/owl.carousel.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.flexslider-min.js',
        'js/jquery.isotope.min.js',
        'rs-plugin/js/jquery.themepunch.tools.min.js',
        'rs-plugin/js/jquery.themepunch.revolution.min.js',
        'js/bootstrap.min.js',
        'js/main.js',

    ];
    public $depends = [
        'frontend\assets\FontAwesomeAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}
