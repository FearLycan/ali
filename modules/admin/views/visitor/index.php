<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\searches\VisitorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitor-index">

    <?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="fa fa-user-secret" aria-hidden="true"></i> Visitors List
                    </h3>
                </div>

                <div class="panel-body">

                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'layout' => "{items}\n{summary}\n{pager}",
                        'columns' => [
                            [
                                'class' => 'yii\grid\SerialColumn',
                                'contentOptions' => ['style' => 'width: 50px'],
                            ],
                            [
                                'attribute' => 'ip',
                                'contentOptions' => ['style' => 'width: 180px'],
                            ],
                            [
                                'attribute' => 'country',
                            ],
                            [
                                'attribute' => 'count',
                                'contentOptions' => ['style' => 'width: 80px; text-align: center;'],
                            ],
                            [
                                'attribute' => 'created_at',
                                'contentOptions' => ['style' => 'width: 150px;'],
                            ],
                            [
                                'attribute' => 'updated_at',
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
