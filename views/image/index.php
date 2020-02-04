<?php

/* @var $this yii\web\View */

use app\components\Helper;
use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;

if (!empty($category)) {
    $this->title = $category->name . ' - ' . Yii::$app->name;
} else {
    $this->title = Yii::$app->name;
}

?>
<div class="site-index">

    <?php if (!empty($category)): ?>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h1 class="module-title font-alt" id="category" data-type="<?= $category->type ?>">
                    <?= Html::encode($category->name) ?>
                </h1>
                <h2 class="module-subtitle font-serif">
                    <?= $dataProvider->getTotalCount() ?> <?= Helper::varietyOfWord('photo', $dataProvider->getTotalCount()) ?>
                </h2>
            </div>
        </div>

        <?php if (($children = $category->getChildrens()) && ($category->id != Category::FIRST_ITEM_ID && $category->id != Category::SPORT_ITEM_ID)): ?>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="filter font-alt" id="filters">
                        <?php foreach ($children as $child): ?>
                            <li><a class="" href="<?= Url::to(['image/index', 'category' => $child->slug]) ?>">
                                    <?= Html::encode($child->name) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>

    <?= $this->render('../common/_image-view', [
        'dataProvider' => $dataProvider,
        'itemView' => '../image/_image',
    ]) ?>

    <?php if (($g2a = Helper::systemConfig('g2a-reflink-uqmJT7b2DP')) && Yii::$app->user->isGuest): ?>
        <?= $g2a ?>
    <?php endif; ?>
</div>