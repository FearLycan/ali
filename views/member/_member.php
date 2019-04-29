<?php
/**
 * @var $model \app\models\Member
 */

use app\components\Helper;
use app\models\Member;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="shop-item">
    <div class="shop-item-image">
        <?php if (empty($model->avatar)): ?>
            <?= Html::img(['/images/site/user.png'], ['alt' => $model->name]) ?>
        <?php else: ?>
            <?= Html::img(['/images/thumbnail/' . $model->avatar], ['alt' => $model->name]) ?>
        <?php endif; ?>
        <div class="shop-item-detail">

            <?php if ($model->id != Member::MEMBER_ANONYMOUS): ?>
                <a class="btn btn-round btn-b" href="<?= Url::to(['country/view', 'slug' => $model->country->slug]) ?>"
                   data-pjax="0">
                    <?= Html::encode($model->country->name) ?>
                </a>
            <?php else: ?>
                <a class="btn btn-round btn-b" data-pjax="0">
                    Unknown
                </a>
            <?php endif; ?>


        </div>
    </div>
    <h4 class="shop-item-title font-alt">
        <a href="<?= Url::to(['member/view', 'slug' => $model->slug], true) ?>" data-pjax="0">
            <?= Helper::cutThis($model->name, 45) ?>
        </a>
    </h4>
</div>



