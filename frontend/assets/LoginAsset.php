<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        'css/all.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'css/tempusdominus-bootstrap-4.min.css',
        'css/icheck-bootstrap.min.css',
        'css/jqvmap.min.css',
        'css/adminlte.min.css',
        'css/OverlayScrollbars.min.css',
        'css/daterangepicker.css',
        'css/summernote-bs4.min.css'
    ];
    public $js = [
        'js/main.js',
        'js/jquery-ui.min.js',
        'js/bootstrap.bundle.min.js',
        'js/Chart.min.js',
        'js/sparkline.js',
        'js/jquery.vmap.min.js',
        'js/jquery.vmap.usa.js',
        'js/jquery.knob.min.js',
        'js/moment.min.js',
        'js/daterangepicker.js',
        'js/tempusdominus-bootstrap-4.min.js',
        'js/summernote-bs4.min.js',
        'js/jquery.overlayScrollbars.min.js',
        'js/adminlte.js',
        'js/demo.js',
        'js/dashboard.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
