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
            ->orderBy(['id' => SORT_DESC])
            ->select(['id', 'url'])->limit(20);

        if ($this->product_id) {
            $images->andWhere(['product_id' => $this->product_id]);
        }

        $imageList = [];
        foreach ($images->each(20) as $image) {
            $imageList[$image->id] = Html::img($image->url, ['class' => 'img-responsive img-thumbnail']);
        }

        return $imageList;
    }
}
