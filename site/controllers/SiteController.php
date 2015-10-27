<?php

namespace app\controllers;

use app\models\forms\EntryForm;
use app\models\user\LoginForm;
use yii\web\Controller;
use Yii;

class SiteController extends Controller
{
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