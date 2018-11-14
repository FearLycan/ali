<?php

use app\models\Image;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Image */

$this->title = 'Image View'

?>


<div class="view-image">
    <div class="row">
        <div class="col-md-8">
            <?= Html::img($model->getOriginalSizeImage(), ['class' => 'img-responsive img-center']) ?>
        </div>
        <div class="col-md-4">
            <div class="media">
                <div class="media-left">
                    <a href="<?= Url::to(['member/view', 'id' => $model->member->ali_member_id]) ?>">
                        <div class="media-img"
                             style="background: url('<?= Url::to(['/images/thumbnail/UTB8JO5wEiDEXKJk43Oqq6Az3XXa5.jpg']) ?>') center center no-repeat;">

                        </div>
                    </a>
                </div>
                <div class="media-body">
                    <a href="<?= Url::to(['member/view', 'id' => $model->member->ali_member_id]) ?>"
                       style="float: left; margin-right: 10px;">
                        <h4 class="media-heading"><?= Html::encode($model->member->name) ?></h4>
                    </a>

                    <?= Html::img(['/images/flags/' . strtolower($model->member->country_code) . '.svg'], ['class' => 'flag', 'alt' => $model->member->country_code, 'title' => $model->member->country_code]) ?>
                </div>
            </div>

            <hr>

            <ul class="list-group font-alt">
                <li class="list-group-item">
                    <a href="#">Cras justo odio</a>
                </li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>

        </div>
    </div>

</div>
