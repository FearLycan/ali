<?php

/* @var $model \app\models\Image */
/* @var $index int */

use app\components\Helper;
use yii\helpers\Url;

$style = '';

?>

<?php if ($index != 0 && ($index % 15) == 0): ?>
    <?php if ($small = Helper::systemConfig('small-ad-' . ($index / 15))): ?>
        <div class="ad-margin-bottom" id="<?= rand(1,1000) ?>">
            <?php $style = 'style="margin-top: 10px;"'; ?>
            <?= $small ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<button
        data-value="<?= Url::to(['image/view', 'slug' => $model->slug]) ?>"
        type="button"
        data-title="<?= $model->member->name ?>"
        data-member-url="<?= Url::to(['member/view', 'slug' => $model->member->slug]) ?>"
        class="show-modal button-clear"
>
    <img src="<?= $model->getNormalSizeImage() ?>" <?= $style ?> alt="Image <?= $model->id ?>"/>
</button>
