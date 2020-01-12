<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\modules\admin\models\Banner;

/* @var $this yii\web\View */
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\searches\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">
    <?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="fa fa-money" aria-hidden="true"></i> Banner List
                    </h3>

                    <div class="btn-group pull-right">
                        <a href="<?= Url::to(['create']) ?>" class="btn btn-success btn-sm">Add new</a>
                    </div>
                </div>
                <div class="panel-body">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'class' => 'yii\grid\SerialColumn',
                                'contentOptions' => ['style' => 'width: 50px'],
                            ],
                            [
                                'attribute' => 'name',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    /* @var Banner $data */
                                    return Html::a($data->name, ['view', 'id' => $data->id]);
                                },
                            ],
                            [
                                'attribute' => 'clicks',
                                'contentOptions' => ['style' => 'width: 50px;'],
                            ],
                            [
                                'attribute' => 'choices',
                                'contentOptions' => ['style' => 'width: 50px;'],
                            ],
                            [
                                'attribute' => 'status',
                                'format' => 'raw',
                                'filter' => Banner::getStatusNames(),
                                'value' => function ($data) {
                                    /* @var Banner $data */
                                    return $data->getStatusName();
                                },
                                'contentOptions' => ['style' => 'width: 120px;'],
                            ],
                            [
                                'attribute' => 'image',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    /* @var Banner $data */
                                    return '<img src="'.Url::to('@web'. Banner::LOCATION . $data->image).'" style="height: 35px;">';
                                },
                                'contentOptions' => ['style' => 'width: 60px;'],
                            ],
                            [
                                'attribute' => 'created_at',
                                'contentOptions' => ['style' => 'width: 150px;'],
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width: 145px'],
                                'template' => '{new_action1} {new_action2} {new_action3}',
                                'buttons' => [
                                    'new_action1' => function ($url, $model, $key) {
                                        return '<a href="' . Url::to(['view', 'id' => $model->id]) . '" class="btn btn-info btn-xs" target="_blank">View</a>';
                                    },
                                    'new_action2' => function ($url, $model, $key) {
                                        return Html::a(
                                            'Edit',
                                            ['update', 'id' => $model->id],
                                            ['title' => 'Edytuj', 'class' => 'btn btn-primary btn-xs']
                                        );
                                    },
                                    'new_action3' => function ($url, $model, $key) {
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
