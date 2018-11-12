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
        $this->url = Helper::getBetween($this->url, '', '?spm');

        $n = explode('/', $this->url);

        $phrase = end($n);

        $model = ProductUrl::find()->where(['like', 'url', $phrase])->one();

        if (!empty($model)) {
            //TODO link to images from product
            $this->addError($attribute, 'We already have this link.');
        }
    }
}