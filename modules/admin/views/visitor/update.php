<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Visitor */

$this->title = 'Update Visitor: ' . $model->ip;
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ip, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="visitor-update">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-user-secret" aria-hidden="true"></i>
                        Visitor Update <?= $model->ip ?>
                    </h3>
                </div>
                <div class="panel-body">

                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
