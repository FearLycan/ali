<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SystemConfig */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'System Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-config-view">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left"><i class="fa fa-cogs" aria-hidden="true"></i> System Config:
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
                            'value',
                            [
                                'label' => 'Status',
                                'format' => 'raw',
                                'value' => $model->getStatusName(),
                            ],
                            [
                                'label' => 'Author',
                                'format' => 'raw',
                                'value' => Html::a($model->author->name, ['user/view', 'id' => $model->author->id]),
                            ],
                            'created_at',
                            'updated_at',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
