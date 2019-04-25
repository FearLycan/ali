<?php
/**
 * @var $model \app\models\Product
 */

use app\components\Helper;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="shop-item">
    <div class="shop-item-image">
        <img src="<?= $model->image ?>" alt="<?= $model->name ?>">
        <div class="shop-item-detail">
            <a class="btn btn-round btn-b" href="<?= Url::to(['image/index', 'category' => $model->category->slug]) ?>">
                <?= Html::encode($model->category->name) ?>
            </a>
        </div>
    </div>
    <h4 class="shop-item-title font-alt">
        <a href="<?= Url::to(['product/view', 'id' => $model->ali_product_id]) ?>">
            <?= Helper::cutThis($model->name, 45) ?>
        </a>
    </h4>
</div>



