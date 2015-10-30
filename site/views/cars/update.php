<?php

use yii\helpers\Html;

$this->title = 'Update user ' . Html::encode($model->username);
?>

<h1><?=$this->title; ?></h1>

<?= $this->render('_createForm', [
    'model' => $model,
]) ?>
