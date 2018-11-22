<?php

/* @var $this yii\web\View */

use app\components\Helper;
use yii\helpers\Html;

if (!empty($category)) {
    $this->title = $category->name . ' - ' . Yii::$app->name;
} else {
    $this->title = Yii::$app->name;
}

//$this->registerMetaTag([
//    'name' => 'twitter:image',
//    'content' => \yii\helpers\Url::to(['images/site/og-image.png'], true),
//]);

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