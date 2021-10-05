<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AdminAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AdminAsset::register($this);

$nails = [
    'category', 'tag', 'item'
];

$system = [
    'visitor'
];

$image = [
    'image', 'valuation'
]
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap" id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= Url::to(['/admin']) ?>"><?= Yii::$app->name ?> Admin Panel</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b
                            class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-footer">
                        <a href="#">Read All New Messages</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b
                            class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    <?= Yii::$app->user->identity->name ?>
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?= Url::to(['/auth/logout']) ?>" data-method="POST"><i
                                    class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="<?= Url::to(['/']) ?>" target="_blank"><i class="fa fa-home"></i> Home Page</a>
                </li>
                <li class="<?= Yii::$app->controller->id == 'default' ? 'active' : 'no' ?>">
                    <a href="<?= Url::to(['/admin']) ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="<?= Yii::$app->controller->id == 'product' ? 'active' : 'no' ?>">
                    <a href="<?= Url::to(['product/index']) ?>"><i class="fa fa-list"></i> Products</a>
                </li>
                <li class="<?= Yii::$app->controller->id == 'category' ? 'active' : 'no' ?>">
                    <a href="<?= Url::to(['category/index']) ?>"><i class="fa fa-tag"></i> Categories</a>
                </li>
                <li class="<?= Yii::$app->controller->id == 'member' ? 'active' : 'no' ?>">
                    <a href="<?= Url::to(['member/index']) ?>"><i class="fa fa-users"></i> Members</a>
                </li>
                <li class="<?= Yii::$app->controller->id == 'comment' ? 'active' : 'no' ?>">
                    <a href="<?= Url::to(['comment/index']) ?>"><i class="fa fa-comment"></i> Comments</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#image">
                        <i class="fa fa-picture-o" aria-hidden="true"></i> Images <i
                                class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="image"
                        class="<?= in_array(Yii::$app->controller->id, $image) ? 'collapse in' : 'collapse' ?>">
                        <li class="<?= Yii::$app->controller->action->id == 'index' ? 'active' : 'no' ?>">
                            <a href="<?= Url::to(['/admin/image']) ?>">
                                <i class="fa fa-list" aria-hidden="true"></i> Images List
                            </a>
                        </li>
                        <li class="<?= Yii::$app->controller->action->id == 'pending' ? 'active' : 'no' ?>">
                            <a href="<?= Url::to(['image/valuation']) ?>">
                                <i class="fa fa-check-square-o" aria-hidden="true"></i> Valuation
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?= Yii::$app->controller->id == 'product-url' ? 'active' : 'no' ?>">
                    <a href="<?= Url::to(['product-url/index']) ?>"><i class="fa fa-link"></i> URLs</a>
                </li>
                <li class="<?= Yii::$app->controller->id == 'visitor' ? 'active' : 'no' ?>">
                    <a href="<?= Url::to(['visitor/index']) ?>"><i class="fa fa-user-secret"></i> Visitors</a>
                </li>
                <li class="<?= Yii::$app->controller->id == 'banner' ? 'active' : 'no' ?>">
                    <a href="<?= Url::to(['banner/index']) ?>"><i class="fa fa-money"></i> Banners</a>
                </li>
                <li class="<?= Yii::$app->controller->id == 'system-config' ? 'active' : 'no' ?>">
                    <a href="<?= Url::to(['system-config/index']) ?>"><i class="fa fa-cogs"></i> System Config</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper" style="min-height: 940px;">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?= $this->title ?>
                        <small>Statistics Overview</small>
                    </h1>

                    <?= Breadcrumbs::widget([
                        'homeLink' => [
                            'label' => '<i class="fa fa-dashboard"></i>' . Html::encode(Yii::t('yii', ' Dashboard')),
                            'url' => Url::to(['/admin']),
                            'encode' => false
                        ],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                </div>
                <div class="col-lg-12">
                    <hr style="margin-top: -1px;">
                </div>
            </div>
            <!-- /.row -->
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>

<?php if (isset($this->blocks['script'])): ?>
    <?= $this->blocks['script'] ?>
<?php endif; ?>

</body>
</html>
<?php $this->endPage() ?>
