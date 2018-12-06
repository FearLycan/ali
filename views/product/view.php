<?php


use app\components\Helper;
use app\models\Product;
use app\models\Ticket;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Product */

$this->title = 'Product ' . $model->name;

?>

<div class="member-view">
    <div class="row">
        <div class="col-md-4">
            <img src="<?= $model->image ?>" class="img-responsive img-center img-thumbnail" alt="Product">
        </div>
        <div class="col-md-8">

            <h2 style="margin-top: 0;">
                <?= Html::encode($model->name) ?>
            </h2>

            <div class="row">
                <div class="col-md-5">
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
                                    'object_id' => $model->ali_product_id
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
