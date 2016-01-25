<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/'.YII_ENV.'/params.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/'.YII_ENV.'/params.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'Quchifan',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'rules' => [
                '/' => '/index/index',
                'food' => '/food/index',
                'order' => '/order/index',
                'about' => '/site/about',
                'login' => '/site/login',
                'signup' => '/site/signup',
            ],
        ],
    ],
    'params' => $params,
];
