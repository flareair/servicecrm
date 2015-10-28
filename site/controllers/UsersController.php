<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ArrayDataProvider;
use app\models\user\User;
use yii\web\NotFoundHttpException;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $query = User::find();

        $users = $query->orderBy('username')->all();

        $users = $this->wrapIntoDataProvider($users);
        return $this->render('index', compact('users'));
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findUser($id),
        ]);
    }

    protected function wrapIntoDataProvider($data)
    {
        return new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 25
            ],
            'key' => 'id'
        ]);
    }

    protected function findUser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}