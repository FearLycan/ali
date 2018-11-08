<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Admin application asset bundle.
 *
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin/sb-admin.css',
        'css/font-awesome.min.css',
        'css/admin/style.css',
    ];
    public $js = [
        'js/admin/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
