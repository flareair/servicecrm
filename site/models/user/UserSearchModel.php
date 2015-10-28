<?php

namespace app\models\user;

use Yii;
use yii\base\Model;
use app\models\user\User;
use yii\data\ActiveDataProvider;

class UserSearchModel extends User
{
    public function rules()
    {
        return [
            [['username'], 'safe'],
        ];
    }
    public function search($params)
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 25
            ],
            'key' => 'id'
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'username' => $this->username,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}