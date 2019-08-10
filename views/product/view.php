<?php


use app\components\Helper;
use app\models\Product;
use app\models\Ticket;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Product */

$this->title = $model->name . ' - ' . Yii::$app->name;;
?>

<div class="product-view">
    <div class="row" itemtype="http://schema.org/Product" itemscope>
        <div class="col-sm-6 mb-sm-40">
            <img src="<?= Url::to(['/images/site/wait.gif']) ?>" data-src="<?= $model->getProductsImages()[0] ?>"
                 class="img-responsive img-center img-thumbnail lazy" id="product"
                 alt="<?= $model->name ?>">

            <ul class="product-gallery">
                <?php foreach ($model->getProductsImages() as $key => $image): ?>
                    <?php if ($key <= 6): ?>
                        <li>
                            <a class="gallery" href="#">
                                <img itemprop="image" src="<?= $image ?>" alt="Single Product" data-original-size="<?= $image ?>">
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-sm-6">
            <meta itemprop="sku" content="<?= $model->ali_product_id ?>"/>
            <meta itemprop="brand" content="<?= $model->brand ?>"/>
            <meta itemprop="description" content="<?= $model->description ?>"/>

            <span itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                     <meta itemprop="ratingValue" content="<?= $model->rating_value ?>"/>
                     <meta itemprop="reviewCount" content="<?= $model->review_count ?>"/>
            </span>

            <span itemprop="offers" itemscope itemtype="https://schema.org/AggregateOffer">
                    <meta itemprop="lowPrice" content="<?= $model->price ?>"/>
                    <meta itemprop="highPrice" content="<?= $model->price ?>"/>
                    <meta itemprop="priceCurrency" content="USD"/>
                    <meta itemprop="offerCount" content="100"/>
            </span>

            <link itemprop="url" href="<?= Url::to(['product/view', 'id' => $model->ali_product_id], true) ?>"/>
            <h1 class="product-title font-alt" style="margin-top: 0;" itemprop="name">
                <?= Html::encode($model->name) ?>
            </h1>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="widget">
                        <ul class="list-group font-alt">
                            <li class="list-group-item">
                                <a href="<?= Url::to(['redirect/product', 'id' => $model->ali_product_id]) ?>">
                                    Go to product page on Aliexpress
                                </a>
                            </li>
                            <li class="list-group-item">
                                <?= Html::a('Report this product', ['ticket/create',
                                    'type' => Ticket::TYPE_PRODUCT,
                                    'object_id' => $model->id
                                ], ['class' => 'report-link']) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 style="margin-top: 0;"><strong><?= Html::encode($model->name) ?></strong>
                has <?= $dataProvider->getTotalCount() ?> <?= \app\components\Helper::varietyOfWord('pic', $dataProvider->getTotalCount()) ?>
            </h3>
        </div>
        <div class="col-md-12">
            <?= $this->render('../common/_image-view', [
                'dataProvider' => $dataProvider,
                'itemView' => '../image/_image',
            ]) ?>
        </div>
    </div>

    <?php if ($long = Helper::systemConfig('long-ad-bottom')): ?>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="long long-bottom">
                    <?= $long ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>

<?php if ($products = $model->getSimilar()): ?>
    <section class="module-small">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3"><h2 class="module-title font-alt">Related Products</h2></div>
            </div>
            <div class="row multi-columns-row">

                <?php foreach ($products as $model): ?>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" itemtype="http://schema.org/Product" itemscope>
                        <div class="shop-item">
                            <div class="shop-item-image">
                                <meta itemprop="name" content="<?= $model->name ?>"/>
                                <meta itemprop="sku" content="<?= $model->ali_product_id ?>"/>
                                <meta itemprop="brand" content="<?= $model->brand ?>"/>
                                <meta itemprop="description" content="<?= $model->description ?>"/>
                                <?php foreach ($model->getProductsImages() as $image): ?>
                                    <meta itemprop="image" content="<?= $image ?>"/>
                                <?php endforeach; ?>

                                <span itemprop="aggregateRating" itemscope
                                      itemtype="https://schema.org/AggregateRating">
                                    <meta itemprop="ratingValue" content="<?= $model->rating_value ?>"/>
                                    <meta itemprop="reviewCount" content="<?= $model->review_count ?>"/>
                                </span>

                                <span itemprop="offers" itemscope itemtype="https://schema.org/AggregateOffer">
                                    <meta itemprop="lowPrice" content="<?= $model->price ?>"/>
                                    <meta itemprop="highPrice" content="<?= $model->price ?>"/>
                                    <meta itemprop="priceCurrency" content="USD"/>
                                    <meta itemprop="offerCount" content="100"/>
                                </span>

                                <img class="lazy"
                                     src="<?= Url::to(['/images/site/wait.gif']) ?>"
                                     data-src="<?= $model->getProductsImages()[0] ?>"
                                     alt="<?= $model->name ?>">
                                <div class="shop-item-detail">
                                    <a class="btn btn-round btn-b"
                                       href="<?= Url::to(['image/index', 'category' => $model->category->slug], true) ?>"
                                       data-pjax="0">
                                        <?= Html::encode($model->category->name) ?>
                                    </a>
                                </div>
                            </div>
                            <h4 class="shop-item-title font-alt">
                                <a itemprop="url"
                                   href="<?= Url::to(['product/view', 'id' => $model->ali_product_id], true) ?>"
                                   data-pjax="0">
                                    <?= Helper::cutThis($model->name, 35) ?>
                                </a>
                            </h4>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($block = Helper::systemConfig('native-ads-01')): ?>
    <div class="row">
        <div class="col-xs-12">
            <hr>
            <h2 class="module-title font-alt text-center">
                You May Also Like
            </h2>
            <?= $block ?>
        </div>
    </div>
<?php endif; ?>
