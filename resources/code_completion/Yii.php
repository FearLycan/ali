<?php

use app\components\WebUser;

/**
 * Fake class to define code completion for IDE.
 *
 * Define your components as properties of bellow classes to get code completion for `Yii::$app->`.
 *
 */
class Yii extends \yii\BaseYii
{
    /**
     * @var BaseApplication|WebApplication|ConsoleApplication the application instance
     */
    public static $app;
}

abstract class BaseApplication extends \yii\base\Application
{
}

class WebApplication extends \yii\web\Application
{
    /**
     * @var WebUser
     */
    public $user;
}

class ConsoleApplication extends \yii\console\Application
{
}
