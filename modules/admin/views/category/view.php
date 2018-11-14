<?php

use app\modules\admin\models\Category;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left"><i class="fa fa-tag" aria-hidden="true"></i> Category:
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
                            'parent_id',
                            'created_at',
                            'updated_at',
                            [
                                'label' => 'Parent',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $parent = $model->getParent();
                                    if ($parent) {
                                        return Html::a($parent->name, ['category/view', 'id' => $parent->id]);
                                    }
                                }
                            ],
                            [
                                'label' => 'Path',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    /* @var $model Category */
                                    $parents = $model->getFamilyPath();
                                    if ($parents) {
                                        $family = '';

                                        foreach ($parents as $parent) {
                                            $family = $family . Html::a($parent['name'], ['category/view', 'id' => $parent['id']]) . ' | ';
                                        }

                                        $family = $family . Html::a($model->name, ['category/view', 'id' => $model->id]);

                                        return $family;
                                    }
                                }
                            ]
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

