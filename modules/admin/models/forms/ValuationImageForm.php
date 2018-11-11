<?php

namespace app\modules\admin\models\forms;

use yii\helpers\Html;

class ValuationImageForm extends \app\modules\admin\models\Image
{
    public $images;
    public $unchecked;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['images', 'unchecked'], 'each', 'rule' => ['integer']],
        ];
    }

    public function imageList()
    {
        $images = self::find()
            ->where(['status' => self::STATUS_NEW])
            ->select(['id', 'url'])
            ->limit(20)
            ->all();

        $imageList = [];
        foreach ($images as $image) {
            $imageList[$image->id] = Html::img($image->url, ['class' => 'img-responsive img-thumbnail']);
        }

        return $imageList;
    }
}