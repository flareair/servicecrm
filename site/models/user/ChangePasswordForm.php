<?php

namespace app\models\user;

use yii\base\Model;
use app\models\user\User;
use Yii;

class ChangePasswordForm extends Model
{
    public $newPassword;
    public $repeatPassword;
    public $user;

    public function rules() {
        return [
            [['newPassword', 'repeatPassword'], 'required'],
            [
                ['repeatPassword'], 'compare', 'message' => 'Passwords must be the same',
                'compareAttribute' => 'newPassword'
            ]
        ];
    }
    public function attributeLabels()
    {
        return [
            'repeatPassword' => 'Repeat new password',
            'newPassword' => 'New password',
        ];
    }
}