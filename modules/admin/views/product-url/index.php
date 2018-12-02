<?php

use app\modules\admin\models\ProductUrl;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\modules\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\searches\ProductUrlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Urls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-url-index">

    <?php Pjax::begin(['id' => 'urls']); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="fa fa-link" aria-hidden="true"></i> URLs List
                    </h3>

                    <div class="btn-group pull-right">
                        <a href="<?= Url::to(['create']) ?>" class="btn btn-success btn-sm">Add new</a>
                    </div>
                </div>

                <div class="panel-body">

                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'layout' => "{items}\n{summary}\n{pager}",
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'attribute' => 'url',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    /* @var ProductUrl $data */
                                    return Html::a(Helper::cutURL($data->url, 155) . ' <small style="color: #777;">(' . $data->id . ')</small>', ['view', 'id' => $data->id]);
                                },
                            ],
                            [
                                'attribute' => 'status',
                                'format' => 'raw',
                                'filter' => ProductUrl::getStatusNames(),
                                'value' => function ($data) {
                                    /* @var ProductUrl $data */
                                    return $data->getStatusName();
                                },
                                'contentOptions' => ['style' => 'width: 120px;'],
                            ],
                            [
                                'attribute' => 'created_at',
                                'contentOptions' => ['style' => 'width: 155px;'],
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => ['style' => 'width: 145px'],
                                'template' => '{new_action1} {new_action2} {new_action3}',
                                'buttons' => [
                                    'new_action1' => function ($url, $model, $key) {
                                        return '<a href="' . $model->url . '" class="btn btn-info btn-xs" target="_blank">View</a>';
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
