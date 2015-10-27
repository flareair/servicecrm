<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\user\User;

class RbacController extends Controller
{
    public function actionInit()
    {
        $rbac = \Yii::$app->authManager;

        $user = $rbac->createRole('user');
        $user->description = 'Can view his cars';
        $rbac->add($user);

        $serviceMan = $rbac->createRole('serviceman');
        $serviceMan->description = 'Can manage cars, create users';
        $rbac->add($serviceMan);

        $admin = $rbac->createRole('admin');
        $admin->description = 'Can do anything';
        $rbac->add($admin);

        $rbac->addChild($admin, $serviceMan);
        $rbac->addChild($serviceMan, $user);

        $rbac->assign(
            $user,
            User::findOne(['username' => 'user'])->id
        );
        $rbac->assign(
            $serviceMan,
            User::findOne(['username' => 'serviceman'])->id
        );

        $rbac->assign(
            $admin,
            User::findOne(['username' => 'admin'])->id
        );
    }
}