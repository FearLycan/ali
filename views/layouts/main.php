<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use app\components\Helper;
use app\models\Category;
use app\widgets\AddNewURL;
use app\widgets\AgeVerify;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

$home = Yii::$app->controller->id == 'image' && Yii::$app->controller->action->id == 'index' && count(Yii::$app->request->get()) == 0;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" dir="ltr">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="robots" content="index, follow"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="google-site-verification" content="a_Ab___KznXBwMsE78rOjtTk2kMSZpW19GaRZtJtIQg"/>
    <link rel="manifest" href="<?= Url::to(['/manifest.json']) ?>">

    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//www.gravatar.com">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <meta name="description" content="<?= Yii::$app->params['meta-description']; ?>"/>
    <meta name="keywords" content="<?= Yii::$app->params['keywords']; ?>" />

    <link rel="canonical" href="<?= Yii::$app->request->absoluteUrl ?>"/>

    <link rel="apple-touch-icon" sizes="57x57" href="<?= Url::to(['/favicon/apple-icon-57x57.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= Url::to(['/favicon/apple-icon-60x60.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Url::to(['/favicon/apple-icon-72x72.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Url::to(['/favicon/apple-icon-76x76.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= Url::to(['/favicon/apple-icon-114x114.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= Url::to(['/favicon/apple-icon-120x120.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= Url::to(['/favicon/apple-icon-144x144.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= Url::to(['/favicon/apple-icon-152x152.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Url::to(['/favicon/apple-icon-180x180.png'], true) ?>">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?= Url::to(['/favicon/android-icon-192x192.png'], true) ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Url::to(['/favicon/favicon-32x32.png'], true) ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= Url::to(['/favicon/favicon-96x96.png'], true) ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Url::to(['/favicon/favicon-16x16.png'], true) ?>">

    <meta name="msapplication-TileColor" content="#0A0A0A">
    <meta name="msapplication-TileImage" content="<?= Url::to(['/favicon/ms-icon-144x144.png'], true) ?>">
    <meta name="theme-color" content="#0A0A0A">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - The Hottest Reviews from Aliexpress</title>

    <meta name="twitter:card" content="summary"/>
    <?= $this->registerMetaTag(Yii::$app->params['twitter_site'], 'twitter_site'); ?>
    <meta name="twitter:title" content="<?= Html::encode($this->title) ?>"/>
    <meta name="twitter:description" content="<?= Yii::$app->params['meta-description']; ?>"/>
    <?= $this->registerMetaTag(Yii::$app->params['twitter_image'], 'twitter_image'); ?>

    <meta property="og:title" content="<?= Html::encode($this->title) ?>"/>
    <meta property="og:description" content="<?= Yii::$app->params['meta-description']; ?>"/>
    <meta property="og:url" content="<?= Yii::$app->request->absoluteUrl ?>"/>
    <?= $this->registerMetaTag(Yii::$app->params['og_type'], 'og_type'); ?>
    <?= $this->registerMetaTag(Yii::$app->params['og_image'], 'og_image'); ?>

    <meta property="fb:pages" content="766392393719178"/>
    <meta property="fb:app_id" content="2009025835858112"/>

    <meta name="robots" content="follow,index"/>

    <?php $this->head() ?>

    <?= Helper::systemConfig('google-tag-manager') ?>
    <?= Helper::systemConfig('facebook-pixel') ?>
    <?= Helper::systemConfig('google-analytics') ?>
    <?= Helper::systemConfig('google-adsense') ?>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Ali Gone Wild",
        "description": "<?= Yii::$app->params['meta-description']; ?>",
        "url": "https://aligonewild.com",
        "logo": "<?= Yii::$app->params['og_image']['content'] ?>"
    }

    </script>

</head>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
<?= Helper::systemConfig('google-tag-manager-noscript') ?>

<?php $this->beginBody() ?>

<div class="page-loader">
    <div class="loader">Loading...</div>
</div>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => $home ? 'navbar navbar-custom navbar-fixed-top navbar-transparent' : 'navbar navbar-custom navbar-fixed-top',
        ],
    ]);

    $items[] = '<li><button type="button" class="button-clear button-nav" data-toggle="modal" data-target="#newURL">Add URL</button></li>';

    $items[] = [
        'label' => Category::FIRST_ITEM_NAME,
        'url' => ['image/index', 'category' => Category::FIRST_ITEM_SLUG],
        'options' => ['id' => 'category_nav'],
        'items' => json_decode(Helper::systemConfig('menu-clothing'), true)
    ];

    $items[] = [
        'label' => Category::SPORT_ITEM_NAME,
        'url' => ['image/index', 'category' => Category::SPORT_ITEM_SLUG],
        'options' => ['id' => 'sport_nav'],
        'items' => json_decode(Helper::systemConfig('menu-sport'), true)
    ];

    $items[] = [
        'label' => 'More',
        'items' => [
            ['label' => 'Categories', 'url' => ['/categories']],
            ['label' => 'Products', 'url' => ['/products']],
            ['label' => 'Members', 'url' => ['/members']],
            ['label' => 'Countries', 'url' => ['/countries']],
            ['label' => 'Contact', 'url' => ['/contact']],
        ],
    ];

    $items[] = '<li><button type="button" class="button-clear button-nav" data-toggle="modal" data-target="#searchModal">Search<i class="fa fa-search" aria-hidden="true" style="margin-left: 5px;"></i></button></li>';

    if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdministrator()) {
        $items[] = ['label' => 'Admin', 'url' => ['/admin']];
    }

    if (Yii::$app->user->isGuest) {
        //$items[] = ['label' => 'Registration', 'url' => ['/auth/registration']];
        ///$items[] = ['label' => 'Login', 'url' => ['/auth/login']];
    } else {
        $items[] = [
            'label' => Yii::$app->user->identity->name,
            'items' => [
                [
                    'label' => 'Profile',
                    'url' => ['/user/profile/view', 'slug' => Yii::$app->user->identity->slug],
                ],
                [
                    'label' => 'Logout',
                    'url' => ['/auth/logout'],
                    'linkOptions' => ['data-method' => 'post'],
                ],
            ],
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
        'encodeLabels' => false,
    ]);

    NavBar::end();
    ?>

    <?php if ($home): ?>
        <section class="home-section bg-dark bg-gradient lazy" id="home"
                 data-src="<?= Url::to('@web/images/home/home-' . rand(1, 25) . '.jpeg') ?>">
            <div class="titan-caption">
                <div class="caption-content">
                    <div class="font-alt mb-10 titan-title-size-1">Welcome to</div>
                    <h1 class="font-alt mb-30 titan-title-size-4"><?= Yii::$app->name ?></h1>
                    <h2 class="font-alt mb-10 titan-title-size-1">The biggest customer pics collection from Aliexpress
                        feedback.
                    </h2>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <div class="container">
        <?= $content ?>
    </div>
</div>

<?php echo AgeVerify::widget() ?>
<?php echo AddNewURL::widget() ?>

<footer class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <p class="copyright font-alt">© <?= date('Y') ?>&nbsp;<a
                            href="<?= Yii::$app->homeUrl ?>"><?= Yii::$app->name ?></a>, All Rights Reserved</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="footer-social-links">
                    <a href="<?= Url::to(['/categories'], true) ?>">Categories</a>
                    <a href="<?= Url::to(['/products'], true) ?>">Products</a>
                    <a href="<?= Url::to(['/members'], true) ?>">Members</a>
                    <a href="<?= Url::to(['/countries'], true) ?>">Countries</a>
                    <a href="<?= Url::to(['/contact'], true) ?>">Contact</a>
                    <a href="https://www.facebook.com/aligonewild69" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/AliGoneWild69" target="_blank"><i class="fa fa-twitter"
                                                                                   aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="col-xs-12" id="description">

                <h3>
                    AliGoneWild - The biggest customer pics collection from Aliexpress feedback.
                </h3>

                <p>
                    The biggest customer pics collection from Aliexpress feedback -
                    Intimates Wear for Women, Bodysuits, Bra & Brief Sets, Dresses,
                    Real Clothes and Much more

                    The Hottest Reviews on Aliexpress
                </p>
            </div>
        </div>
    </div>
</footer>

<div class="scroll-up" style="display: block;"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>

<div id="searchModal" class="modal fade bs-example-modal-lg" aria-labelledby="searchModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title font-alt">Search</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="search">Search category, product, country</label>
                            <input type="text" class="form-control" id="search"
                                   placeholder="category, product, country...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
<?= $this->blocks['script'] ?>
<link rel="stylesheet" type="text/css"
      href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
    window.addEventListener("load", function () {
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#000"
                },
                "button": {
                    "background": "#f1d600"
                }
            },
            "theme": "classic"
        })
    });

    let zooming = new Zooming({
        'bgColor': 'rgb(10, 10, 10)',
        'bgOpacity': 0.99,
        'zIndex': 1000,
    });

    document.addEventListener('DOMContentLoaded', function () {
        zooming.listen('img.img-zoomable');
    });

    $( document ).ready(function() {
        $('div#description').hide();
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
