<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\modules\admin\models\Member;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\searches\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">
    <?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="fa fa-users" aria-hidden="true"></i> Member List
                    </h3>

                    <div class="btn-group pull-right">
                        <a href="<?= Url::to(['create']) ?>" class="btn btn-success btn-sm">Add new</a>
                    </div>
                </div>

                <div class="panel-body">

                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                       // 'filterModel' => $searchModel,
                        'options' => ['class' => 'table-responsive'],
                        'layout' => "{items}\n{summary}\n{pager}",
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'attribute' => 'name',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    /* @var Member $data */
                                    return Html::a($data->name . ' <small style="color: #777;">('.$data->id.')</small>', ['view', 'id' => $data->id]);
                                },
                            ],
                            //'ali_member_id',
                            'country_code',
                            'click',
                            [
                                'attribute' => 'status',
                                'format' => 'raw',
                                'filter' => Member::getStatusNames(),
                                'value' => function ($data) {
                                    /* @var Member $data */
                                    return $data->getStatusName();
                                },
                                'contentOptions' => ['style' => 'width: 90px;'],
                            ],
                            [
                                'attribute' => 'type',
                                'format' => 'raw',
                                'filter' => Member::getTypesNames(),
                                'value' => function ($data) {
                                    /* @var Member $data */
                                    return $data->getTypeName();
                                },
                                'contentOptions' => ['style' => 'width: 90px;'],
                            ],
                            [
                                'attribute' => 'created_at',
                                'contentOptions' => ['style' => 'width: 155px;'],
                            ],
                            [
                                'attribute' => 'updated_at',
                                'contentOptions' => ['style' => 'width: 155px;'],
                            ],
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

