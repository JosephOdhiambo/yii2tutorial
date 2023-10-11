<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
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
            ],
        ],
    ],
];
