<?php
return [
    'id' => 'servicecrm',
    'basePath' => realpath(__DIR__ . '/../'),
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'user' => [
            'identityClass' => 'app\models\user\User',
        ],
        'db' => require(__DIR__ . '/db.php'),
        'request' => [
            'cookieValidationKey' => 'secret123123',
            // 'baseUrl' => '/'
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '/',
            // 'enableStrictParsing' => true,
            'rules' => [
                '/' => 'site/index',
                'country' => '/country/index',
                'login' => '/site/login',
            ],
        ],
    ],
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php')
];