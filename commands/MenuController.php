<?php

namespace app\commands;

use app\components\Helper;
use app\models\Category;
use yii\console\Controller;

class MenuController extends Controller
{
    public function actionBuild()
    {
        $clothingItems = Category::getCategoryItems(Category::TYPE_WOMEN_CLOTHING);
        $sportItems = Category::getCategoryItems(Category::TYPE_SPORT);

        Helper::setSystemConfig('menu-clothing', json_encode($clothingItems));
        Helper::setSystemConfig('menu-sport', json_encode($sportItems));
    }
}