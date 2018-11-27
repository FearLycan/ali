<?php

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = 'Contact' . ' - ' . Yii::$app->name;
?>


<section class="module" id="contact">
    <div class="container">
        <?php Pjax::begin(['enablePushState' => false]); ?>
            <?php if ($success): ?>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">

                        <div class="ajax-response font-alt" id="contactFormResponse">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                Thank You! I will be in touch
                            </div>
                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Get in touch</h2>
                    <div class="module-subtitle font-serif"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <?php $form = ActiveForm::begin([
                        'options' => ['data' => ['pjax' => true]],
                    ]) ?>

                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Your Name'])->label(false); ?>

                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Your Email'])->label(false); ?>

                    <?= $form->field($model, 'message')->textarea(['rows' => '7', 'placeholder' => 'Message'])->label(false); ?>

                    <div class="text-center">
                        <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Submit</button>
                    </div>
                    <?php ActiveForm::end() ?>


                </div>
            </div>
        <?php Pjax::end(); ?>
    </div>
</section>