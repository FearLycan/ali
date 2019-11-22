<?php
use app\components\Helper;
use yii\helpers\Html;

$this->title = 'Pics collection from ' . $country->name . ' - ' . Yii::$app->name;
?>

<div class="view-image">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h1 class="module-title font-alt" data-type="<?= $country->id ?>">
                <?= Html::encode($country->name) ?>
            </h1>
            <h2 class="module-subtitle font-serif">
                Pics collection from <?= Html::encode($country->name) ?> <br>
                <?= $dataProvider->getTotalCount() ?> <?= Helper::varietyOfWord('pic', $dataProvider->getTotalCount()) ?>
            </h2>
        </div>

        <div class="col-md-12">
            <?= $this->render('../common/_image-view', [
                'dataProvider' => $dataProvider,
                'itemView' => '../image/_image',
            ]); ?>
        </div>
    </div>
</div>