<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'lib/easy-autocomplete/easy-autocomplete.min.css',
        'css/font-awesome.min.css',
        'css/site.css',
    ];
    public $js = [
        'lib/jquery.lazy/jquery.lazy.min.js',
        'js/masonry-docs.min.js',
        'js/infinite-scroll.pkgd.min.js',
        'lib/easy-autocomplete/jquery.easy-autocomplete.min.js',
        'js/jquery.timeago.js',
        'js/main.js',
        'js/grid.js',
        'js/zooming.min.js',
        'lib/isotope/dist/isotope.pkgd.js',
        //'js/isotope-filter.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
