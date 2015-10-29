<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\user\User;
use app\models\user\UserSearchModel;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;
use Yii;

class UsersController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['serviceman']
                    ],
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionView($id)
    {
        if (!Yii::$app->user->can('manageAccounts', ['id' => $id])) {
            throw new ForbiddenHttpException('You not allowed to view this page.');
        }
        return $this->render('view', [
            'model' => $this->findUser($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can('manageAccounts', ['id' => $id])) {
            throw new ForbiddenHttpException('You not allowed to view this page.');
        }
        $model = $this->findUser($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        if (!Yii::$app->user->can('manageAccounts', ['id' => $id])) {
            throw new ForbiddenHttpException('You not allowed to view this page.');
        }
        $this->findUser($id)->delete();

        return $this->redirect(['index']);
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