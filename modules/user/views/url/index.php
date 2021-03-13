<?php

use app\models\Product;
use app\modules\admin\components\Helper;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel \app\modules\user\models\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products added by ' . Yii::$app->user->identity->name . ' - ' . Yii::$app->name;

?>
<?= $this->render('../profile/_header', [
    'model' => Yii::$app->user->identity,
]) ?>

<hr class="divider-w">

<?= $this->render('../profile/_menu', [
    //'model' => Yii::$app->user,
]) ?>

<style>
    ul.pagination {
        display: block;
    }
</style>

<section>
    <div class="row">
        <h2 class="font-alt">Your added URLs</h2>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'options' => ['class' => 'table-responsive'],
            //'layout' => "{items}\n{summary}\n{pager}",
            'summary' => false,
            'tableOptions' => ['class' => 'table table-striped table-hover'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'url',
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'status',
                    'label' => false,
                    'format' => 'raw',
                    'filter' => Product::getStatusNames(),
                    'value' => function ($data) {
                        /* @var Product $data */
                        return $data->getStatusName();
                    },
                    'contentOptions' => ['style' => 'width: 120px;'],
                ],
                [
                    'attribute' => 'created_at',
                    'contentOptions' => ['style' => 'width: 155px;'],
                ],
            ],
        ]); ?>

    </div>
</section>

<?php $this->beginBlock('script') ?>
<script>
    $('ul.pagination').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12 font-alt');

    $(document).on('pjax:success', function () {
        $('ul.pagination').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12 font-alt');
    });
</script>
<?php $this->endBlock(); ?>
