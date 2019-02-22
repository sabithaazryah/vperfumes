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
        'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css',
        'https://use.fontawesome.com/releases/v5.5.0/css/all.css',
        'https://fonts.googleapis.com/css?family=Karla:400,700|Playfair+Display:400,700,900',
        'https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900>',
        'https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800',
        'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css',
        'css/pricefilter.css',
        'css/pricefilterbar.css',
        'css/style.css',
        'css/responsive.css',
        'css/arabic.css',
        'css/responsive_arabic.css',
    ];
    public $js = [
        /*--home-clients---*/
        'https://unpkg.com/popper.js@1.14.6/dist/umd/popper.min.js',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js',
        '//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js',
        /*--Product Zoom---*/
        'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.6/jquery.fancybox.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.js',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js',
        /*--Client says---*/
        'js/pricefilter.js',
        'js/pricefilterbar.js',
        'https://www.google.com/recaptcha/api.js',
        'js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
