<?php

use app\models\Image;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Image */

$this->title = 'Image View'

?>


<div class="view-image">
    <div class="row">

        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
            </ol>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-8">
            <?= Html::img($model->getOriginalSizeImage(), ['class' => 'img-responsive img-center']) ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="media">
                <div class="media-left">
                    <a href="<?= Url::to(['member/view', 'id' => $model->member->ali_member_id]) ?>">

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
                    <a href="<?= Url::to(['member/view', 'id' => $model->member->ali_member_id]) ?>"
                       style="float: left; margin-right: 10px;">
                        <h4 class="media-heading"><?= Html::encode($model->member->name) ?></h4>
                    </a>

                    <?php if ($model->member_id != \app\models\Member::MEMBER_ANONYMOUS): ?>
                        <?= Html::img(['/images/flags/' . strtolower($model->member->country_code) . '.svg'], ['class' => 'flag', 'alt' => $model->member->country_code, 'title' => $model->member->country_code]) ?>
                    <?php endif; ?>

                </div>
            </div>

            <hr>

            <div class="widget">
                <ul class="list-group font-alt">
                    <li class="list-group-item">
                        <a href="<?= Url::to(['member/view', 'id' => $model->member->id]) ?>">
                            Go to <strong><?= Html::encode($model->member->name) ?></strong> profile
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?= Url::to(['redirect/member', 'slug' => $model->member->slug]) ?>">
                            Go to <strong><?= Html::encode($model->member->name) ?></strong> Ali profile
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?= Url::to(['redirect/product', 'id' => $model->product->ali_product_id]) ?>">
                            Go to product page on Ali
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?= Url::to(['product/view', 'id' => $model->product->ali_product_id]) ?>">
                            See more photos of this product
                        </a>
                    </li>
                </ul>
            </div>


        </div>
    </div>

</div>
