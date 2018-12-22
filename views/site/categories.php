<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'All Categories' . ' - ' . Yii::$app->name;
?>

<div class="site-index">

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h2 class="module-title font-alt" data-type="0">
                All Categories
            </h2>
            <div class="module-subtitle font-serif">
                We have <?= count($categories) ?> categories
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <ul class="filter font-alt" id="filters">

                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="<?= Url::to(['image/index', 'category' => $category['slug']]) ?>">
                            <?= Html::encode($category['name']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>

</div>
