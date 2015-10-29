<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\user\User;
use app\rbac\ManageOnlyUsersRule;

class RbacController extends Controller
{
        private $users = [
        [
            'username' => 'admin',
            'password' => '1234',
            'role' => 'admin',
            'firstname' => 'Administrator',
            'email' => 'admin@admin.ru'
        ],
        [
            'username' => 'serviceman',
            'password' => '1234',
            'role' => 'serviceman',
            'firstname' => 'Vasily',
            'lastname' => 'Fedorov',
            'company_name' => 'OOO STO-GAZ',
            'email' => 'vasily@fedorov.ru'
        ],
        [
            'username' => 'user',
            'password' => '1234',
            'role' => 'user',
            'firstname' => 'Ivan',
            'lastname' => 'Petrov',
            'company_name' => 'IP Petrov',
            'email' => 'ivan@petrov.com'
        ]
    ];

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

    }

    public function actionUsers()
    {
        foreach ($this->users as $userData) {
            $user = new User();
            $user->attributes = $userData;
            $user->save();
        }
    }
}