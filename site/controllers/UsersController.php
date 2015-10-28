<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\user\User;
use app\models\user\UserSearchModel;
use yii\web\NotFoundHttpException;
use Yii;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new UserSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findUser($id),
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