<?php
/**
 * Created by PhpStorm.
 * User: Damian Brończyk
 * Date: 11.11.2018
 * Time: 19:46
 */

namespace app\widgets;


use app\models\forms\ProductUrlForm;
use yii\base\Widget;

class AddNewURL extends Widget
{
    public $model;


    public function init()
    {
        parent::init();
        if ($this->model === null) {
            $this->model = new ProductUrlForm();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        /* @noinspection RenderMethodInspection */
        return $this->render('addNewURLForm', [
            'model' => $this->model,
            'success' => false,
        ]);
    }
}