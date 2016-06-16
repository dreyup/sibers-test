<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'seo_crm',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'env'],
    'language'=>'ru_RU',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles'=>['user', 'admin'],
        ],
        'request' => [
            'cookieValidationKey' => 'vOEmqXsnJJ1tBokmOavYh3fTlXZfMraY',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
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
        'env' => [
            'class' => 'app\components\AppEnv',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug']['class'] = 'yii\debug\Module';
    $config['modules']['debug']['allowedIPs'] = ['127.0.0.1', '::1', '37.193.177.128'];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
