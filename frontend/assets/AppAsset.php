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
        'css/all.css',
        'css/bootstrap.min.css',
        'css/mdb.min.css',
        'css/custom.css',
    ];
    public $js = [
        'js/jquery-3.3.1.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/mdb.min.js',
        'js/jquery.bootpag.min.js',
        'js/custompanigation.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
