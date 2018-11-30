<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>

<?php if ($view): ?>

    <!-- Modal Age Verify -->
    <div class="modal fade" id="ageVerify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php Pjax::begin(['enablePushState' => false]); ?>
                <?php $form = ActiveForm::begin([
                    'action' => Url::to(['site/age-verify']),
                    'options' => ['data' => ['pjax' => true]],
                ]) ?>

                <div class="modal-header">
                    <h4 class="modal-title font-alt" id="myModalLabel12">Age Verification</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-offset-4">
                            <img src="<?= Url::to(['favicon/ms-icon-310x310.png']) ?>" class="img-responsive" style="margin: 0 auto;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h2 class="module-title font-alt"
                                style="margin-bottom: 50px; margin-top: 20px;"><?= Yii::$app->name ?></h2>
                            <div class="module-subtitle font-serif" style="margin-bottom: 20px;">
                                This Website requires you to be <strong><?= $model->age ?></strong> years or older to
                                enter.
                            </div>
                            <div class="module-subtitle font-serif" style="margin-bottom: 20px;">
                                Please enter your Date of Birth in the fields below in order to continue.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <?= $form->errorSummary($model, ['header' => false]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 col-lg-offset-3">
                            <?= $form->field($model, 'day', ['errorOptions' => ['style' => 'display: none;', 'encode' => false]])->textInput(['placeholder' => 'day', 'style' => 'text-align: center;'])->label(false); ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'month', ['errorOptions' => ['style' => 'display: none;', 'encode' => false]])->textInput(['placeholder' => 'month', 'style' => 'text-align: center;'])->label(false); ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'year', ['errorOptions' => ['style' => 'display: none;', 'encode' => false]])
                                ->textInput(['placeholder' => 'year', 'style' => 'text-align: center;'])->label(false); ?>
                        </div>
                    </div>
                </div> <!--, ['errorOptions' => ['style' => 'display: none;', 'encode' => false]] -->
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-d btn-round btn-block">Verify</button>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end() ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>

<?php endif; ?>