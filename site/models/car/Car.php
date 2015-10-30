<?php

namespace app\models\car;

use yii\db\ActiveRecord;


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
            [['manufacturer', 'model'], 'string'],
            [['owner', 'year'], 'integer'],
            [['date_in', 'date_out'], 'date', 'format'=>'yyyy-MM-dd hh:mm:ss'],
            [['comment'], 'string']
        ];
    }
}