<?php

use yii\helpers\Html;

$this->title = 'Update car ' . Html::encode("$model->manufacturer $model->model");
?>

<h1><?=$this->title; ?></h1>

<?= $this->render('_createForm', [
    'model' => $model,
    'users' => $users,
]) ?>
