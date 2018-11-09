<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\searches\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="product-search">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1
            ],
        ]); ?>

        <div class="col-md-3 col-lg-offset-9">
            <?= $form->field($model, 'name')->label(false)->textInput(['placeholder' => 'Name']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
