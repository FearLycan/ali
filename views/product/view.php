<?php


use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Product */

$this->title = 'Product ' . $model->name;

?>

<div class="member-view">
    <div class="row">
        <div class="col-md-4">
            <img src="<?= $model->image ?>" class="img-responsive img-center img-thumbnail">
        </div>
        <div class="col-md-8">

            <h2 style="margin-top: 0;">
                <?= Html::encode($model->name) ?>
            </h2>

            <div class="row">
                <div class="col-md-4">
                    <div class="widget">
                        <ul class="list-group font-alt">
                            <li class="list-group-item">
                                <a href="<?= Url::to(['redirect/product', 'id' => $model->ali_product_id]) ?>">
                                    Go to product page on Ali
                                </a>
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
                have <?= $dataProvider->getTotalCount() ?> <?= \app\components\Helper::varietyOfWord('photo', $dataProvider->getTotalCount()) ?>
            </h3>
        </div>
        <div class="col-md-12">
            <?= $this->render('..\common\_image-view', [
                'dataProvider' => $dataProvider,
                'itemView' => '..\image\_image',
            ]) ?>
        </div>
    </div>
</div>
