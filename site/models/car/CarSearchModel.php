<?php

namespace app\models\car;

use Yii;
use yii\base\Model;
use app\models\car\Car;
use yii\data\ActiveDataProvider;

class CarSearchModel extends Car
{
    public function rules()
    {
        return [
            [['manufacturer'], 'safe'],
            [['model'], 'safe'],
            [['gov_number'], 'safe'],
            // [['lastname'], 'safe'],
            // [['company_name'], 'safe'],
        ];
    }
    public function search($params)
    {
        $query = Car::find();

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

        // if (!Yii::$app->user->can('manageAccounts')) {
        //     $query->andFilterWhere(['role' => 'user']);
        // }

        $query->andFilterWhere(['like', 'manufacturer', $this->manufacturer]);
        $query->andFilterWhere(['like', 'model', $this->model]);
        $query->andFilterWhere(['like', 'gov_number', $this->gov_number]);

        return $dataProvider;
    }
}