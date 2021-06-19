<?php

use yii\helpers\ArrayHelper;

$config = [
    'id' => 'basic',
    'name' => 'AliGoneWild',
    'defaultRoute' => 'image/index',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'db' => ArrayHelper::merge(
            require __DIR__ . '/db.php',
            require __DIR__ . '/db-local.php'
        ),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'app\components\WebUser',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['auth/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            //'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'RandomStringTopSecret',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<alias:admin>' => 'admin/default/index',
                '<alias:rules>' => 'site/rules',
                '<alias:(contact|CONTACT)>' => 'site/contact',
                '<alias:categories>' => 'site/categories',
                '<alias:(country|countries)>' => 'country/index',
                '<controller:(member|product)>s' => '<controller>/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                'redirect/product/<id>' => 'redirect/product',
                'redirect/member/<slug>' => 'redirect/member',
                '<category>' => 'image/index',
                '<controller:country>/<slug>' => '<controller>/view',
                '<controller:member>/<slug>' => '<controller>/view',
                'view/<slug>' => 'image/view',
                'ticket/create/<type>/<object_id>' => 'ticket/create',
                'auth/activation/<code>' => 'auth/activation',
                'user/products' => 'user/product/index',
                'user/urls' => 'user/url/index',
                'user/<slug>' => 'user/profile/view',
                'top/<top>' => 'top/index',
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'visitors' => [
            'class' => 'app\components\Visitors\Visitors',
        ],
        'banner' => [
            'class' => 'app\components\Banner\Banner',
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
    ],
    'params' => ArrayHelper::merge(
        require __DIR__ . '/params.php',
        require __DIR__ . '/params-local.php'
    ),
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
