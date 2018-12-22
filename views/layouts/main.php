<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\components\Helper;
use app\models\Category;
use app\widgets\AddNewURL;
use app\widgets\AgeVerify;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <meta name="description" content="<?= Yii::$app->params['meta-description']; ?>"/>

    <link rel="canonical" href="<?= Yii::$app->request->absoluteUrl ?>"/>

    <link rel="apple-touch-icon" sizes="57x57" href="<?= Url::to(['favicon/apple-icon-57x57.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= Url::to(['favicon/apple-icon-60x60.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Url::to(['favicon/apple-icon-72x72.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Url::to(['favicon/apple-icon-76x76.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= Url::to(['favicon/apple-icon-114x114.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= Url::to(['favicon/apple-icon-120x120.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= Url::to(['favicon/apple-icon-144x144.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= Url::to(['favicon/apple-icon-152x152.png'], true) ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Url::to(['favicon/apple-icon-180x180.png'], true) ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= Url::to(['favicon/android-icon-192x192.png'], true) ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Url::to(['favicon/favicon-32x32.png'], true) ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= Url::to(['favicon/favicon-96x96.png'], true) ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Url::to(['favicon/favicon-16x16.png'], true) ?>">

    <meta name="msapplication-TileColor" content="#0A0A0A">
    <meta name="msapplication-TileImage" content="<?= Url::to(['favicon/ms-icon-144x144.png'], true) ?>">
    <meta name="theme-color" content="#0A0A0A">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="<?= Yii::$app->request->absoluteUrl ?>"/>
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

    <?php $this->head() ?>

    <?= Helper::systemConfig('google-analytics') ?>
    <?= Helper::systemConfig('google-adsense') ?>

</head>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
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
            ['label' => 'All Categories', 'url' => ['/categories']],
            ['label' => 'Contact', 'url' => ['/contact']],
        ],
    ];

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
                ['label' => 'Logout',
                    'url' => ['/auth/logout'],
                    'linkOptions' => ['data-method' => 'post'],
                ],
            ],
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
    ]);

    NavBar::end();
    ?>

    <?php if ($home): ?>
        <section class="home-section bg-dark bg-gradient" id="home"
                 data-background="<?= Url::to('@web/images/home/home-' . rand(1, 10) . '.jpeg') ?>">
            <div class="titan-caption">
                <div class="caption-content">
                    <div class="font-alt mb-10 titan-title-size-1">Welcome to</div>
                    <div class="font-alt mb-30 titan-title-size-4"><?= Yii::$app->name ?></div>
                    <div class="font-alt mb-10 titan-title-size-1">The biggest customer pics collection from Aliexpress
                        feedback.
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
                    <a href="https://www.facebook.com/AliGoneWild69" target="_blank"><i class="fa fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

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
</script>
</body>
</html>
<?php $this->endPage() ?>
