<?php

use yii\helpers\Html;

?>

<h1>Update user <?= Html::encode($model->username)?></h1>

<?= $this->render('_createForm', [
    'model' => $model,
]) ?>
