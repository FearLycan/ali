<?php

namespace app\modules\api\components;

use app\components\AccessControl;
use Yii;
use yii\web\Request;
use yii\web\Response;


/**
 * Basic controller for api.
 *
 * @author Damian Brończyk <damian.bronczyk@gmail.com.pl>
 */
class Controller extends \app\components\Controller
{
    /**
     * {@inheritdoc}
     */
    public $layout = 'admin';

    /** @var Request */
    public $request;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $this->request = Yii::$app->request;

        return parent::beforeAction($action);
    }
}
