<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'List of all members' . ' - ' . Yii::$app->name;;

?>

<style>
    ul.pagination {
        display: block;
    }
</style>

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <h2 class="module-title font-alt">
            List of members
        </h2>
        <div class="module-subtitle font-serif" style="margin-bottom: 0;">
            We have <?= $dataProvider->getTotalCount() ?> members
        </div>
    </div>
</div>

<?php Pjax::begin([
    'scrollTo' => true
]); ?>
<section class="module-small">
    <?= $this->render('_search', ['model' => $searchModel]); ?>
</section>
<hr class="divider-w">
<section class="module-small">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_member',
        'summary' => false,
        'itemOptions' => ['class' => 'col-xs-6 col-sm-6 col-md-3 col-lg-3'],
    ]); ?>
</section>
<?php Pjax::end(); ?>

<?php $this->beginBlock('script') ?>
<script>
    $('ul.pagination').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12 font-alt');

    $(document).on('pjax:success', function () {
        $('ul.pagination').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12 font-alt');

        $('.lazy').Lazy({
            scrollDirection: 'vertical',
            effect: 'fadeIn',
            effectTime: 1000,
            enableThrottle: true,
            throttle: 250
        });
    });
</script>
<?php $this->endBlock(); ?>
