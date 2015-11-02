<?php

use yii\helpers\Html;

?>

<h1>Create new car</h1>

<?= $this->render('_createForm', [
    'model' => $model,
    'users' => $users
]) ?>
