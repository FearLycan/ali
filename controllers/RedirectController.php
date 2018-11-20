<?php
/**
 * Created by PhpStorm.
 * User: Damian Brończyk
 * Date: 19.11.2018
 * Time: 14:16
 */

namespace app\controllers;

use app\components\Controller;
use app\models\Member;
use app\models\Product;
use yii\web\NotFoundHttpException;

class RedirectController extends Controller
{
    /**
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     * @throws NotFoundHttpException
     */
    public function actionProduct($id)
    {
        $model = Product::find()
            ->where(['ali_product_id' => $id, 'status' => Product::STATUS_ACTIVE])
            ->one();

        if ($model !== null) {
            $this->go($model->url);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * @param $slug
     * @return array|null|\yii\db\ActiveRecord
     * @throws NotFoundHttpException
     */
    public function actionMember($slug)
    {
        /* @var $model Member */
        $model = Member::find()
            ->where(['slug' => $slug, 'status' => Member::STATUS_ACTIVE])
            ->one();

        $ali_member_id = str_replace(" ", "+", $model->ali_member_id);

        $url = 'https://feedback.aliexpress.com/display/detail.htm?ownerMemberId=' . $ali_member_id . '&memberType=buyer';

        if ($model !== null) {
            $this->go($url);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    protected function go($url, $permanent = false)
    {
        if ($permanent) {
            header('HTTP/1.1 301 Moved Permanently');
        }
        header('Location: ' . $url);
        exit();
    }

    /**
     * Finds the Image model based on its slug value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $slug
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Product::find()
            ->where(['ali_product_id' => $id, 'status' => Product::STATUS_ACTIVE])
            ->one();

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}