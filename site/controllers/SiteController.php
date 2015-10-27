<?php

namespace app\controllers;

use app\models\forms\EntryForm;
use app\models\user\LoginForm;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['user']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?']
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', compact('model'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}