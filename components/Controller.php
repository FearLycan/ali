<?php

namespace app\components;

use app\components\Visitors\Visitors;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class Controller extends \yii\web\Controller
{
    /** @var Visitors */
    private $visitors;


    public function __construct($id, $module, Visitors $visitors)
    {
        $this->visitors = $visitors;
        parent::__construct($id, $module);
    }

    /**
     * Throws NotFoundHttpException.
     *
     * @param string|null $message
     * @throws NotFoundHttpException
     */
    public function notFound($message = null)
    {
        if ($message === null) {
            $message = 'The requested page does not exist.';
        }
        throw new NotFoundHttpException($message);
    }

    /**
     * Throws ForbiddenHttpException.
     *
     * @param string|null $message
     * @throws ForbiddenHttpException
     */
    public function accessDenied($message = null)
    {
        if ($message === null) {
            $message = 'Nie jesteś uprawniony do przeglądania tej strony.';
        }
        throw new ForbiddenHttpException($message);
    }

    /**
     * @param $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        // your custom code here, if you want the code to run before action filters,
        // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl

        if (!parent::beforeAction($action)) {
            return false;
        }

        $this->visitors->ip->check();

        return true; // or false to not run the action
    }
}