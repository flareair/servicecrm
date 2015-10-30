<?php

namespace app\controllers;

use app\models\car\Car;
use app\models\car\CarSearchModel;

use yii\web\Controller;
use Yii;


class CarsController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new CarSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findCar($id),
    //     ]);
    // }

    // public function actionCreate()
    // {
    //     $model = new User();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    // public function actionUpdate($id)
    // {
    //     $model = $this->findCar($id);
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('update', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    // public function actionDelete($id)
    // {
    //     $this->findCar($id)->delete();

    //     return $this->redirect(['index']);
    // }

    // protected function findCar($id)
    // {
    //     if (($model = User::findOne($id)) !== null) {
    //         return $model;
    //     } else {
    //         throw new NotFoundHttpException('The requested page does not exist.');
    //     }
    // }
}