<?php

use app\modules\admin\models\Image;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left"><i class="fa fa-list" aria-hidden="true"></i> Product:
                        <strong><?= Html::encode($model->name) ?></strong>
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
                            'name',
                            'url:url',
                            'ali_owner_member_id',
                            'ali_product_id',
                            [
                                'attribute' => 'image',
                                'label' => 'Image URL'

                            ],
                            [
                                'attribute' => 'image',
                                'format' => 'raw',
                                'value' => function($model){
                                    $html = '';
                                    /* @var $model Image */
                                    foreach (json_decode($model->image) as $image){
                                        $html.= '<div class="col-xs-3"><img src="'.$image.'" class="img-responsive"></div>';
                                    }

                                    return $html;
                                }
                            ],
                            [
                                'attribute' => 'status',
                                'format' => 'raw',
                                'value' => $model->getStatusName()
                            ],
                            [
                                'attribute' => 'type',
                                'format' => 'raw',
                                'value' => $model->getTypeName()
                            ],
                            'created_at',
                            'updated_at',
                            'synchronized_at',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
