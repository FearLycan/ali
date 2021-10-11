<?php

use app\modules\admin\models\Comment;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'author_id')->textInput()->hint($model->author->name) ?>
                </div>

                <div class="col-md-12">
                    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="<?= $model->image->getOriginalSizeImage() ?>" class="img-responsive"
                         style="max-height: 400px; margin: 0 auto; display: block;">
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <hr>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'up_vote')->textInput(['type' => 'number']) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'down_vote')->textInput(['type' => 'number']) ?>
        </div>

        <div class="col-md-12">
            <hr>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'status')
                ->dropDownList(Comment::getStatusNames()); ?>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
