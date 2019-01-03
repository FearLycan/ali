<?php
use app\components\Helper;
use yii\helpers\Html;

$this->title = 'Members from ' . $country->name . ' - ' . Yii::$app->name;
?>

<div class="view-image">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h2 class="module-title font-alt" data-type="<?= $country->id ?>">
                <?= Html::encode($country->name) ?>
            </h2>
            <div class="module-subtitle font-serif">
                <?= $dataProvider->getTotalCount() ?> <?= Helper::varietyOfWord('photo', $dataProvider->getTotalCount()) ?>
            </div>
        </div>

        <div class="col-md-12">
            <?= $this->render('../common/_image-view', [
                'dataProvider' => $dataProvider,
                'itemView' => '../image/_image',
            ]); ?>
        </div>
    </div>
</div>