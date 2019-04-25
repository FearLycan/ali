<?php
use app\models\Category;
use app\models\Product;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $model \app\models\searches\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1,
        'class' => 'row'
    ],
]); ?>

<div class="col-sm-2 mb-sm-20">
    <?= $form->field($model, 'sort')
        ->dropDownList([
            '-rating' => 'Popular',
            'rating' => 'Unpopular',
            '-created_at' => 'Latest',
            'created_at' => 'Eldest',
            'name' => 'A -> Z',
            '-name' => 'Z -> A',
        ], [
            'prompt' => 'Default Sorting', [
                'disabled' => true,
            ]
        ])->label(false); ?>
</div>

<div class="col-sm-5 mb-sm-20">
    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name'])->label(false) ?>
</div>

<div class="col-sm-3 mb-sm-20">
    <?= $form->field($model, 'category')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Category::find()->orderBy(['name' => SORT_ASC])->all(), 'slug', 'name'),
        //'hideSearch' => true,
        'options' => ['placeholder' => 'Category'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label(false); ?>
</div>

<div class="col-sm-2">
    <button class="btn btn-block btn-round btn-g" type="submit">Apply</button>
</div>

<?php ActiveForm::end(); ?>
