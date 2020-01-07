<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$this->title = 'All Countries' . ' - ' . Yii::$app->name;

?>
<div class="site-index">

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h1 class="module-title font-alt" data-type="0">
                All Countries
            </h1>
            <h2 class="module-subtitle font-serif">
                From which we have interesting pics
            </h2>
        </div>
    </div>

    <section class="module-small">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 mb-sm-20">
                <div class="form-group field-name">
                    <input type="text" id="name" class="form-control quicksearch" name="name"
                           placeholder="Country Name"
                           aria-invalid="false">
                </div>
            </div>

        </div>

    </section>

    <hr class="divider-w">

    <section class="module-small">
        <div class="col-sm-12">
            <ul class="filter font-alt" id="filters">

                <?php foreach ($dataProvider->getModels() as $item): ?>
                    <li class="country <?= $item->slug ?>" data-name="<?= $item->name ?>">
                        <a href="<?= Url::to(['country/view', 'slug' => $item->slug]) ?>">
                            <?= Html::encode($item->name) ?>
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </section>

</div>

<?php
    $isotope = Url::to('@web/lib/isotope/dist/isotope.pkgd.js', true);
    $isotope_filter = Url::to('@web/js/isotope-filter.js', true);
?>

<?php
$this->registerJs(<<<JS
    $.getScript('$isotope');
    $.getScript('$isotope_filter');
JS
);
?>
