<?php

namespace app\models\forms;

use app\modules\admin\components\Helper;
use app\modules\admin\models\ProductUrl;
use yii\helpers\Html;


class ProductUrlForm extends ProductUrl
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'status'], 'required'],
            [['status'], 'integer'],
            [['url'], 'url', 'defaultScheme' => 'https'],
            [['url'], 'checkAliURL', 'skipOnEmpty' => false, 'skipOnError' => false],
            [['url'], 'uniqueURL', 'skipOnEmpty' => false, 'skipOnError' => false],
        ];
    }

    public function checkAliURL($attribute, $params)
    {
        if (strpos($this->url, 'aliexpress.com') === false) {
            $this->addError($attribute, 'Are you sure this is Aliexpress link?');
        } else {
            if (strpos($this->url, 'aliexpress.com/item/') === false) {
                $this->addError($attribute, 'Invalid Aliexpress link.');
            }
        }
    }

    public function uniqueURL($attribute, $params)
    {
        $this->url = Helper::getBetween($this->url, '', '?');

        $n = explode('/', $this->url);

        $phrase = end($n);

        $model = ProductUrl::find()->where(['like', 'url', $phrase])->one();

        if (!empty($model) && $model->status == ProductUrl::STATUS_NEW) {
            $this->addError($attribute, 'This link is waiting for processing.');
        } elseif (!empty($model) && ($model->status == ProductUrl::STATUS_ERROR || $model->status == ProductUrl::STATUS_TO_DELETE)) {
            $this->addError($attribute, 'We already have this link.');
        } elseif (!empty($model) && $model->status == ProductUrl::STATUS_DONE) {
            $id = str_replace(".html", "", $phrase);
            $this->addError($attribute, 'We already have this link. ' . Html::a('Check it', ['product/view', 'id' => $id], ['data-pjax' => 0, 'id' => 'product_link']));
        }
    }
}