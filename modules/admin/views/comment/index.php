<?php

use app\modules\admin\components\Helper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\searches\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">
    <?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="fa fa-comment" aria-hidden="true"></i> Comments
                    </h3>

                    <div class="btn-group pull-right">
                     <!--   <a href="<?= Url::to(['create']) ?>" class="btn btn-success btn-sm">Add new</a> -->
                    </div>
                </div>

                <div class="panel-body">

                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'options' => ['class' => 'table-responsive'],
                        'layout' => "{items}\n{summary}\n{pager}",
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'attribute' => 'content',
                                'label' => 'Content',
                                //'contentOptions' => ['style' => 'width: 250px;'],
                                'value' => function ($data) {
                                    return Html::encode($data->content);
                                }
                            ],
                            [
                                'attribute' => 'author_id',
                                'label' => 'Author',
                                'format' => 'raw',
                                'contentOptions' => ['style' => 'width: 160px;'],
                                'value' => function ($data) {
                                    return Html::a($data->author->name, ['user/view', 'id' => $data->author->id]);
                                }
                            ],
                            [
                                'attribute' => 'image_id',
                                'label' => 'Image',
                                'format' => 'raw',
                                'headerOptions' => ['style' => 'width: 80px; text-align:center;'],
                                'contentOptions' => ['style' => 'width: 80px; text-align:center;'],
                                'value' => function ($data) {
                                    return Html::a('Image', ['/image/view', 'slug' => $data->image->slug], ['target' => '_blank', 'data-pjax' => 0]);
                                }
                            ],
                            [
                                'attribute' => 'status',
                                'label' => 'Status',
                                'format' => 'raw',
                                'headerOptions' => ['style' => 'width: 80px; text-align:center;'],
                                'contentOptions' => ['style' => 'width: 80px; text-align:center;'],
                                'value' => function ($data) {
                                    return Helper::getStatusLabel($data);
                                }
                            ],
                            [
                                'attribute' => 'up_vote',
                                'label' => 'Up',
                                'headerOptions' => ['style' => 'width: 80px; text-align:center;'],
                                'contentOptions' => ['style' => 'width: 80px; text-align:center;'],
                            ],
                            [
                                'attribute' => 'down_vote',
                                'label' => 'Down',
                                'headerOptions' => ['style' => 'width: 80px; text-align:center;'],
                                'contentOptions' => ['style' => 'width: 80px; text-align:center;'],
                            ],
                            [
                                'attribute' => 'created_at',
                                'contentOptions' => ['style' => 'width: 155px;'],
                            ],
                            //'updated_at',

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
