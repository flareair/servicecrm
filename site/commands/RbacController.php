<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\user\User;
use app\rbac\ManageOnlyUsersRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $rbac = \Yii::$app->authManager;

        $rule = new ManageOnlyUsersRule();
        $rbac->add($rule);

        $manageOnlyUsers = $rbac->createPermission('manageOnlyUsers');
        $manageOnlyUsers->ruleName = $rule->name;

        $manageAllAccounts = $rbac->createPermission('manageAccounts');

        $rbac->add($manageOnlyUsers);
        $rbac->add($manageAllAccounts);
        $rbac->addChild($manageOnlyUsers, $manageAllAccounts);

        $user = $rbac->createRole('user');
        $user->description = 'Can view his cars';
        $rbac->add($user);

        $serviceMan = $rbac->createRole('serviceman');
        $serviceMan->description = 'Can manage cars, create users';
        $rbac->add($serviceMan);
        $rbac->addChild($serviceMan, $user);
        $rbac->addChild($serviceMan, $manageOnlyUsers);

        $admin = $rbac->createRole('admin');
        $admin->description = 'Can do anything';
        $rbac->add($admin);
        $rbac->addChild($admin, $serviceMan);
        $rbac->addChild($admin, $manageAllAccounts);



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