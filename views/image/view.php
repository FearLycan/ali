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
                            <a property="item" typeof="WebPage"
                               href="<?= Url::to(['image/index', 'category' => $category['slug']], true) ?>">
                                <span property="name"><?= $category['name'] ?></span>
                            </a>
                            <meta property="position" content="<?= $key + 1 ?>">
                        </li>

                    <?php endforeach; ?>

                    <li property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage"
                           href="<?= Url::to(['image/index', 'category' => $model->product->category->slug], true) ?>">
                            <span property="name"><?= $model->product->category->name ?></span>
                        </a>
                        <meta property="position"
                              content="<?= count($model->product->category->getFamilyPath()) + 1 ?>">
                    </li>
                </ol>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <h1 class="product-title font-alt" style="margin-top: 0;">
                    <?= Html::encode($model->product->name) ?>
                </h1>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-8">
                <img class="img-responsive img-center lazy" id="product"
                     src="<?= Url::to(['/images/site/wait.gif']) ?>"
                     data-src="<?= $model->getOriginalSizeImage() ?>"
                    alt="<?= $model->member->name ?>">

                <?php if ($images = $model->getMoreUserImages()): ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <ul class="product-gallery">
                                <?php foreach ($images as $key => $image): ?>
                                    <li class="li-gallery <?= $key != 0 ?: 'li-gallery-border' ?>" data-key="<?= $key ?>">
                                       <a class="gallery" href="<?= Url::to(['image/view', 'slug' => $image->slug]) ?>">
                                            <img src="<?= Url::to(['/images/site/wait.gif']) ?>"
                                                 data-src="<?= $image->getNormalSizeImage() ?>"
                                                 data-original-size="<?= $image->getOriginalSizeImage() ?>"
                                                 data-url="<?= Url::to(['image/view', 'slug' => $image->slug]) ?>"
                                                 alt="Product Image <?= $key ?>"
                                                 class="lazy">
                                       </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

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
                                    See more pics from <strong><?= $model->member->country->name ?>
                                        (<?= $model->member->country->countPics() ?>) </strong>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="list-group-item">
                            <?= Html::a('Report this pic', ['ticket/create',
                                'type' => Ticket::TYPE_IMAGE,
                                'object_id' => $model->id
                            ], ['class' => 'report-link']) ?>
                        </li>

                        <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdministrator()): ?>
                            <li class="list-group-item">
                                <?= Html::a('Edit', ['/admin/member/update', 'id' => $model->member_id]) ?>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>

                <?php if($block = Helper::systemConfig('live-cam-01')): ?>
                <hr>
                <div class="widget">
                    <?= $block ?>
                </div>
                <?php endif; ?>

            </div>
        </div>

    </div>


<?php if ($images = $model->getSimilarFromCategory(4)): ?>
    <section class="module-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">
                        Related pics of this product
                    </h2>
                </div>
            </div>
            <div class="row multi-columns-row">

                <?php foreach ($images as $model): ?>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <div class="shop-item">
                            <div class="shop-item-image">

                                <img class="lazy" src="<?= Url::to(['/images/site/wait.gif']) ?>"
                                     data-src="<?= Url::to(['/images/normal/' . $model->file]) ?>"
                                     alt="<?= $model->member->name ?>">

                                <div class="shop-item-detail">
                                    <a class="btn btn-round btn-b"
                                       href="<?= Url::to(['member/view', 'slug' => $model->member->slug], true) ?>"
                                       data-pjax="0">
                                        <?= Html::encode($model->member->name) ?>
                                    </a>
                                </div>
                            </div>
                            <h4 class="shop-item-title font-alt">
                                <a href="<?= Url::to(['member/view', 'slug' => $model->member->slug], true) ?>"
                                   data-pjax="0">
                                    <?= Helper::cutThis($model->member->name, 45) ?>
                                </a>
                            </h4>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php endif; ?>