<?php

/* @var $model \app\models\forms\TicketForm */

use app\models\Ticket;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

//die(var_dump($model));

?>

<div class="row">

    <div class="row">
        <?php Pjax::begin(['enablePushState' => false]); ?>
        <?php $form = ActiveForm::begin([
            'options' => ['data' => ['pjax' => true]],
        ]) ?>

        <div class="col-md-12">
            <?= $form->field($model, 'reason')->dropDownList(
                Ticket::getReasonNames(), [
                    'prompt' => 'Select Reason', [
                        'disabled' => true,
                    ]
                ]
            ); ?>
        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'description')->textarea(['placeholder' => 'WHY?', 'rows' => 6]); ?>
        </div>

        <div class="col-md-12">
            <button class="btn btn-b btn-round" type="submit">Submit</button>
        </div>

        <?php ActiveForm::end() ?>
        <?php Pjax::end(); ?>
    </div>

</div>
