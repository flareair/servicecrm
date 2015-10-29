<?php
$config = [
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
                'login' => '/site/login',
                'users' => '/users/index',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@app/runtime/logs/servicecrm.log',
                    'maxFileSize' => 1024 * 2,
                    'maxLogFiles' => 20,
                ],
            ],
        ],
    ],
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class'=>'yii\debug\Module',
        'allowedIPs'=> ['*']
    ];
}

return $config;