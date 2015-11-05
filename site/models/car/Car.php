<?php

namespace app\models\car;

use yii\db\ActiveRecord;
use app\models\user\User;

class Car extends ActiveRecord
{

    public static function tableName()
    {
        return 'car';
    }

    public function rules()
    {
        return [
            [['manufacturer', 'model', 'owner'], 'required'],
            [['manufacturer', 'model', 'gov_number'], 'string'],
            [['owner', 'year'], 'integer'],
            [['date_in', 'date_out'], 'date', 'format'=>'yyyy-MM-dd HH:mm'],
            [['comment'], 'string']
        ];
    }

    public function getOwnerprofile() {
        return $this->hasOne(User::className(), ['id' => 'owner']);
    }
}