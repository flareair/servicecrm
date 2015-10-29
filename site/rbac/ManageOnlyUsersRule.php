<?php

namespace app\rbac;

use yii\rbac\Rule;
use Yii;
// use app\models\user\User;
/**
 * Checks if authorID matches user passed via params
 */
class ManageOnlyUsersRule extends Rule
{
    public $name = 'canUpdateUsers';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        if (isset($params['id'])) {
            $userRoles = Yii::$app->authManager->getRolesByUser($params['id']);
            return isset($userRoles['user']) ? true : false;
        }
        return false;
    }
}