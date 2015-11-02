<?php

namespace app\models\user;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use Yii;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [
                ['username', 'password', 'auth_key'],
                'string', 'max' => 255
            ],
            [['username', 'password'], 'required'],
            [['username'], 'unique'],
            [['role'], 'string'],
            [['role'], 'in', 'range' => ['admin', 'serviceman', 'user']],
            [['firstname'], 'required'],
            [['firstname', 'lastname', 'middlename'], 'string', 'max' => 255],
            [['company_name'], 'string', 'max' => 255],
            [['address', 'about'] , 'string'],
            [['email'], 'required'],
            [['email'], 'email'],
            [['phone'], 'string', 'max' => 20],
            [['phone'], 'unique'],
            [['phone'], 'required']
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
            if ($this->isAttributeChanged('password')) {
                $this->password = Yii::$app->security->generatePasswordHash(
                    $this->password
                );
            }

            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if (in_array('role', array_keys($changedAttributes))) {
            $rbac = Yii::$app->authManager;
            $roleName = !empty($this->role) ? $this->role : 'user';
            $role = $rbac->getRole($roleName);
            $rbac->revokeAll($this->getId());
            $rbac->assign($role, $this->getId());
        }
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }


    public static function getServiceMans()
    {
        return static::find()->where(['role' => 'serviceman'])->all();
    }

    public static function getClients()
    {
        return static::find()->where(['role' => 'user'])->all();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
