<?php

/* @var $this yii\web\View */

use app\components\Helper;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap\Modal;

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <?php if (!empty($category)): ?>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt" id="category"><?= Html::encode($category->name) ?></h2>
                <div class="module-subtitle font-serif">
                    <?= $dataProvider->getTotalCount() ?> <?= Helper::varietyOfWord('photo', $dataProvider->getTotalCount()) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?= $this->render('..\common\_image-view', [
        'dataProvider' => $dataProvider,
        'itemView' => '..\image\_image',
    ]) ?>

</div>