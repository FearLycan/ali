<?php

use app\models\Product;
use app\modules\admin\components\Helper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\searches\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="fa fa-list" aria-hidden="true"></i> Products List
                    </h3>
                </div>

                <div class="panel-body">

                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'layout' => "{items}\n{summary}\n{pager}",
                        'columns' => [
                            'id',
                            [
                                'attribute' => 'name',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    /* @var Product $data */
                                    return Html::a(Helper::cutThis($data->name), ['view', 'id' => $data->id]);
                                },
                            ],
                            [
                                'attribute' => 'status',
                                'format' => 'raw',
                                'filter' => Product::getStatusNames(),
                                'value' => function ($data) {
                                    /* @var Product $data */
                                    return $data->getStatusName();
                                },
                                'contentOptions' => ['style' => 'width: 120px;'],
                            ],
                            [
                                'attribute' => 'url',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    /* @var Product $data */
                                    return '<a href=' . $data->url . '>Ali URL</a>';
                                },
                            ],
                            'created_at',
                            'synchronized_at',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width: 110px'],
                                'template' => '{new_action1} {new_action2}',
                                'buttons' => [
                                    'new_action1' => function ($url, $model, $key) {
                                        return Html::a(
                                            'Edit',
                                            ['update', 'id' => $model->id],
                                            ['title' => 'Edytuj', 'class' => 'btn btn-primary btn-xs']
                                        );
                                    },
                                    'new_action2' => function ($url, $model, $key) {
                                        return Html::a(
                                            'Delete',
                                            ['delete', 'id' => $model->id],
                                            [
                                                'title' => 'Delete', 'class' => 'btn btn-danger btn-xs',
                                                'data' => [
                                                    'confirm' => 'Are you sure you want to delete this item?',
                                                    'method' => 'post',
                                                ],
                                            ]
                                        );
                                    },
                                ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
