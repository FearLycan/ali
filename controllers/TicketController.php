<?php

namespace app\controllers;

use app\components\Controller;
use app\models\forms\TicketForm;
use app\models\Ticket;
use Yii;

class TicketController extends Controller
{
    public function actionCreate($type = null, $object_id = null)
    {
        $object = null;

        if ($type != null && $object_id != null) {
            if (!in_array($type, Ticket::getTicketTypes())) {
                $this->notFound();
            }

            if (!($object = Ticket::getObject($type, $object_id))) {
                $this->notFound();
            }
        }

        $model = new TicketForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->model_id = $object_id;
            $model->type = $type;

            $model->save();

            Yii::$app->session->setFlash('success', true);
            return $this->redirect(Yii::$app->request->absoluteUrl);
        }

        return $this->render('create', [
            'model' => $model,
            'object' => $object,
            'type' => $type
        ]);
    }
}