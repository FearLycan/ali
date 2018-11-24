<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\forms\AgeVerifyForm;

class AgeVerify extends Widget
{
    const AGE_CONFIRMED = 1;
    const AGE_NOT_CONFIRMED = 0;

    public $model;
    public $view;


    public function init()
    {
        parent::init();
        $cookies = Yii::$app->request->cookies;

        $age = $cookies->getValue('age');

        if ($age == null) {
            $this->model = new AgeVerifyForm();
            $this->view = true;
        } else {
            $this->view = false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        /* @noinspection RenderMethodInspection */
        return $this->render('ageVerify', [
            'model' => $this->model,
            'view' => $this->view,
        ]);
    }
}