<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\models\Category;
use app\widgets\Alert;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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

    <link rel="manifest" href="<?= Url::to(['/manifest.json']) ?>">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <meta name="description" content="<?= Yii::$app->params['meta-description']; ?>"/>

    <link rel="canonical" href="<?= Yii::$app->request->absoluteUrl ?>"/>

    <link rel="apple-touch-icon" sizes="57x57" href="<?= Url::to(['favicon/apple-icon-57x57.png']) ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= Url::to(['favicon/apple-icon-60x60.png']) ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Url::to(['favicon/apple-icon-72x72.png']) ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Url::to(['favicon/apple-icon-76x76.png']) ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= Url::to(['favicon/apple-icon-114x114.png']) ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= Url::to(['favicon/apple-icon-120x120.png']) ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= Url::to(['favicon/apple-icon-144x144.png']) ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= Url::to(['favicon/apple-icon-152x152.png']) ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Url::to(['favicon/apple-icon-180x180.png']) ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= Url::to(['favicon/android-icon-192x192.png']) ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Url::to(['favicon/favicon-32x32.png']) ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= Url::to(['favicon/favicon-96x96.png']) ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Url::to(['favicon/favicon-16x16.png']) ?>">

    <meta name="msapplication-TileColor" content="#0A0A0A">
    <meta name="msapplication-TileImage" content="<?= Url::to(['favicon/ms-icon-144x144.png']) ?>">
    <meta name="theme-color" content="#0A0A0A">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="<?= Yii::$app->request->absoluteUrl ?>"/>
    <meta name="twitter:title" content="<?= Html::encode($this->title) ?>"/>
    <meta name="twitter:description" content="<?= Yii::$app->params['meta-description']; ?>"/>
    <?= $this->registerMetaTag(Yii::$app->params['twitter_image'], 'twitter_image'); ?>

    <meta property="og:title" content="<?= Html::encode($this->title) ?>"/>
    <meta property="og:image" content="<?= Html::encode($this->title) ?>"/>
    <meta property="og:description" content="<?= Yii::$app->params['meta-description']; ?>"/>
    <meta property="og:url" content="<?= Yii::$app->request->absoluteUrl ?>"/>
    <?= $this->registerMetaTag(Yii::$app->params['og_type'], 'og_type'); ?>
    <?= $this->registerMetaTag(Yii::$app->params['og_image'], 'og_image'); ?>
    <?php $this->head() ?>
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
            'class' => 'navbar navbar-custom navbar-fixed-top',
        ],
    ]);

    $items[] = '<li><button type="button" class="button-clear button-nav" data-toggle="modal" data-target="#newURL">Add URL</button></li>';

    $items[] = [
        'label' => Category::FIRAT_ITEM_NAME,
        'url' => Yii::$app->homeUrl,
        'options' => ['id' => 'category_nav'],
        'items' => Category::getCategoryItems()
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

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?= \app\widgets\AddNewURL::widget() ?>

<footer class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <p class="copyright font-alt">© <?= date('Y') ?>&nbsp;<a
                            href="<?= Yii::$app->homeUrl ?>"><?= Yii::$app->name ?></a>, All Rights Reserved</p>
            </div>
            <!--            <div class="col-xs-12 col-sm-6 col-md-6">-->
            <!--                <div class="footer-social-links">-->
            <!--                    <a href="#"><i class="fa fa-facebook"></i></a>-->
            <!--                    <a href="#"><i class="fa fa-twitter"></i></a>-->
            <!--                    <a href="#"><i class="fa fa-dribbble"></i></a>-->
            <!--                    <a href="#"><i class="fa fa-skype"></i></a>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
<?= $this->blocks['script'] ?>
</body>
</html>
<?php $this->endPage() ?>
