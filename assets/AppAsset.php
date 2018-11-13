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
        'lib/animate.css/animate.css',
        'lib/et-line-font/et-line-font.css',
        'lib/flexslider/flexslider.css',
        'lib/owl.carousel/dist/assets/owl.carousel.min.css',
        'lib/owl.carousel/dist/assets/owl.theme.default.min.css',
        'lib/magnific-popup/dist/magnific-popup.css',
        'lib/simple-text-rotator/simpletextrotator.css',

        'css/style.css',
        'css/colors/default.css',
        'css/font-awesome.min.css',
        'css/site.css',
    ];
    public $js = [
        'lib/wow/dist/wow.js',
        //'lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js',
        'lib/isotope/dist/isotope.pkgd.js',
        'lib/imagesloaded/imagesloaded.pkgd.js',
        //'lib/flexslider/jquery.flexslider.js',
        //'lib/owl.carousel/dist/owl.carousel.min.js',
        'lib/smoothscroll.js',
        //'lib/magnific-popup/dist/jquery.magnific-popup.js',
        //'lib/simple-text-rotator/jquery.simple-text-rotator.min.js',
        'js/plugins.js',

        //'js/masonry-docs.min.js',
        //'js/imagesloaded.pkgd.min.js',

        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
