<?php
/**
 * @var $model \app\models\Product
 */

use app\components\Helper;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="shop-item" itemtype="http://schema.org/Product" itemscope>
    <div class="shop-item-image">
        <meta itemprop="name" content="<?= $model->name ?>"/>
        <meta itemprop="sku" content="<?= $model->ali_product_id ?>"/>
        <meta itemprop="brand" content="<?= $model->brand ?>"/>
        <meta itemprop="description" content="<?= $model->description ?>"/>
        <?php foreach ($model->getProductsImages() as $image): ?>
            <meta itemprop="image" content="<?= $image ?>"/>
        <?php endforeach; ?>

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

        <img class="lazy" src="<?= Url::to(['/images/site/wait.gif']) ?>"
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
        <a itemprop="url" href="<?= Url::to(['product/view', 'id' => $model->ali_product_id], true) ?>" data-pjax="0">
            <?= Helper::cutThis($model->name, 40) ?>
        </a>
    </h4>
</div>



