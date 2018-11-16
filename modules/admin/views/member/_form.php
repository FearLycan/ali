<?php

use app\modules\admin\models\forms\MemberForm;
use app\modules\admin\models\Member;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Image;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'ali_member_id')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'country_code')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'status')
                ->dropDownList(Member::getStatusNames()); ?>
        </div>


        <div class="col-md-2">
            <?= $form->field($model, 'type')
                ->dropDownList(Member::getTypesNames()); ?>
        </div>

        <?php if ($model->scenario == MemberForm::SCENARIO_UPDATE): ?>

            <div class="col-md-6">

            <?php

            $url = \yii\helpers\Url::to('@web/images/thumbnail/');

            $format = <<< SCRIPT
function format(state) {
console.log(state);
    if (!state.id) return state.text; // optgroup
    src = '$url' +  state.text
    return '<img class="flag" style="width: 20px; margin-right: 10px;" src="' + src + '"/>' + state.text;
}
SCRIPT;
            $escape = new JsExpression("function(m) { return m; }");
            $this->registerJs($format, View::POS_HEAD);


            ?>

            <?= $form->field($model, 'avatar')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Image::find()->where(['member_id' => $model->id])->all(), 'file', 'file'),
                'language' => 'en',
                'options' => ['placeholder' => 'Avatar'],
                'size' => Select2::LARGE,
                'pluginOptions' => [
                    'templateResult' => new JsExpression('format'),
                    'templateSelection' => new JsExpression('format'),
                    'escapeMarkup' => $escape,
                    'allowClear' => true
                ],
            ])->label('Avatar'); ?>
        </div>

        <?php endif; ?>

        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
