<?php

use app\components\Helper;
use app\models\Image;
use app\models\Member;
use app\models\Ticket;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Image */

$this->title = $model->member->name . ' pic' . ' - ' . Yii::$app->name;

Yii::$app->params['og_image']['content'] = Url::to(['images/thumbnail/' . $model->file], true);
Yii::$app->params['og_type']['content'] = 'article';

?>


<div class="view-image">
    <div class="row">

        <div class="col-md-12 col-xs-12 col-sm-12">
            <ol class="breadcrumb" vocab="https://schema.org/" typeof="BreadcrumbList">

                <?php foreach ($model->product->category->getFamilyPath() as $key => $category): ?>

                    <li property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" href="<?= Url::to(['image/index', 'category' => $category['slug']], true) ?>">
                          <span property="name"><?= $category['name'] ?></span>
                        </a>
                        <meta property="position" content="<?= $key+1 ?>">
                    </li>

                <?php endforeach; ?>

                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="<?= Url::to(['image/index', 'category' => $model->product->category->slug], true) ?>">
                        <span property="name"><?= $model->product->category->name ?></span>
                    </a>
                    <meta property="position" content="<?= count($model->product->category->getFamilyPath()) + 1 ?>">
                </li>
            </ol>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-8">
            <?= Html::img($model->getOriginalSizeImage(), ['class' => 'img-responsive img-center'], ['alt' => 'Product Image']) ?>
        </div>

        <div class="visible-xs col-xs-12 col-sm-12">
            <hr>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="media">
                <div class="media-left">
                    <a href="<?= Url::to(['member/view', 'slug' => $model->member->slug]) ?>">

                        <?php if (empty($model->member->avatar)): ?>
                            <div class="media-img"
                                 style="background: url('<?= Url::to(['/images/site/user.png']) ?>') center center no-repeat;">
                            </div>
                        <?php else: ?>
                            <div class="media-img"
                                 style="background: url('<?= Url::to(['/images/thumbnail/' . $model->member->avatar]) ?>') center center no-repeat;">
                            </div>
                        <?php endif; ?>

                    </a>
                </div>
                <div class="media-body">
                    <a href="<?= Url::to(['member/view', 'slug' => $model->member->slug]) ?>"
                       style="float: left; margin-right: 10px;">
                        <h4 class="media-heading"><?= Html::encode($model->member->name) ?></h4>
                    </a>

                    <?php if ($model->member_id != Member::MEMBER_ANONYMOUS): ?>
                        <a href="<?= Url::to(['country/view', 'slug' => $model->member->country->slug]) ?>">
                            <?= Html::img(['/images/flags/' . strtolower($model->member->country_code) . '.svg'], ['class' => 'flag', 'alt' => $model->member->country->name, 'title' => $model->member->country->name]) ?>
                        </a>
                    <?php endif; ?>

                </div>
            </div>

            <hr>

            <div class="widget">
                <ul class="list-group font-alt">
                    <li class="list-group-item">
                        <a href="<?= Url::to(['member/view', 'slug' => $model->member->slug]) ?>">
                            See more pics of <strong><?= Html::encode($model->member->name) ?></strong> member
                        </a>
                    </li>
                    <?php if ($model->member_id != Member::MEMBER_ANONYMOUS): ?>
                        <li class="list-group-item">
                            <a href="<?= Url::to(['redirect/member', 'slug' => $model->member->slug]) ?>">
                                Go to <strong><?= Html::encode($model->member->name) ?></strong> Aliexpress profile
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="list-group-item">
                        <a href="<?= Url::to(['redirect/product', 'id' => $model->product->ali_product_id]) ?>">
                            Go to product page on Aliexpress
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?= Url::to(['product/view', 'id' => $model->product->ali_product_id]) ?>">
                            See more pics of this product
                        </a>
                    </li>
                    <?php if ($model->member_id != Member::MEMBER_ANONYMOUS && $model->member->country->countPics() > 0): ?>
                        <li class="list-group-item">
                            <a href="<?= Url::to(['country/view', 'slug' => $model->member->country->slug]) ?>">
                                See more pics from <strong><?= $model->member->country->name ?> (<?= $model->member->country->countPics() ?>) </strong>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="list-group-item">
                        <?= Html::a('Report this pic', ['ticket/create',
                            'type' => Ticket::TYPE_IMAGE,
                            'object_id' => $model->slug
                        ], ['class' => 'report-link']) ?>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <?php if (($long = Helper::systemConfig('long-ad-bottom')) && !$ajaxView): ?>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="long long-bottom">
                    <?= $long ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
