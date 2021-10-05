<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\forms\CommentForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model CommentForm */
/* @var $form yii\widgets\ActiveForm */
?>
<?php Pjax::begin([
    //'scrollTo' => true,
    'id' => 'pjaxComment',
]); ?>
<div class="comment-form" style="margin: 10px 0 0;">

    <?php $form = ActiveForm::begin(['options' => ['data' => ['pjax' => true]]]); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'content')->textarea([
                'maxlength' => true,
                'placeholder' => 'Tell me what you think about...'
            ])->label('Your comment') ?>
            <span class="emoji-picker hidden-xs hidden-sm" style="float: right;">
                <img src="<?= Url::to('@web/images/site/emoji.png') ?>" style="height: 30px;">
            </span>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Post', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php Pjax::end(); ?>

<?php $this->beginBlock('script') ?>
<script>
    $(document).on('click', '#commentform-content', function () {
        $(this).attr('rows', 4);
    });
</script>
<?php $this->endBlock(); ?>
