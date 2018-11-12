<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="newURL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">
            <?php Pjax::begin(['enablePushState' => false]); ?>
            <?php $form = ActiveForm::begin([
                'action' => Url::to(['site/new-url']),
                'options' => ['data' => ['pjax' => true]],
            ]) ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add new URL</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <?php if ($success): ?>
                        <div class="col-md-12">
                            <p class="text-success">
                                <strong>URL was added.</strong>
                            </p>
                        </div>
                    <?php endif; ?>


                    <div class="col-md-12">
                        <?= $form->field($model, 'url', ['errorOptions' => ['class' => 'help-block', 'encode' => false]])
                            ->textInput(['maxlength' => false])
                            ->label('New Product URL from aliexpress.com')
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>

            <?php ActiveForm::end() ?>
            <?php Pjax::end(); ?>
        </div>

    </div>
</div>
