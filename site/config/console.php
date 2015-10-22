<?php
return [
    'id' => 'servicecrm-console',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
        // 'authManager' => [
        //     'class' => 'yii\rbac\DbManager',
        //     // 'defaultRoles' => ['guest'],
        // ],
    ],
];