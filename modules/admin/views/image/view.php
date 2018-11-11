<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Image */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-view">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left"><i class="fa fa-language" aria-hidden="true"></i> Images:
                        <strong>ID: <?= Html::encode($model->id) ?></strong>
                    </h3>
                    <div class="pull-right">
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>
                <div class="panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'url:url',
                            [
                                'attribute' => 'image',
                                'format' => 'raw',
                                'value' => Html::img($model->url,['style' => 'width: 20%;'])
                            ],
                            [
                                'attribute' => 'product_id',
                                'format' => 'raw',
                                'value' => Html::a($model->product->name, ['product/view' , 'id' => $model->product_id])
                            ],
                            [
                                'attribute' => 'member_id',
                                'format' => 'raw',
                                'value' => Html::a($model->member->name, ['member/view' , 'id' => $model->member_id])
                            ],
                            'status',
                            'created_at',
                            'updated_at',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

