<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'calendar' => [
            'class' => 'philippfrenzel\yii2fullcalendar\Module',
        ],
    ],

    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => ['jquery.js'],
                ],
                'yii\jui\JuiAsset' => [
                    'css' => ['themes/smoothness/jquery-ui.css'],
                    'js' => ['jquery-ui.js'],
                ],
                'bizley\ajaxdropdown\src\assets\AjaxDropdownAsset' => [
                    'sourcePath' => '@vendor/bizley/ajaxdropdown/src/assets',
                    'js' => ['ajaxdropdown.js'],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    'js' => [],
                ],
                'philippfrenzel\yii2fullcalendar\FullCalendarAsset' => [
                    'sourcePath' => null,
                ],
            ],
        ],
    ],
];
