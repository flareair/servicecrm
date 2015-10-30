<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

$this->title = 'View user ' . Html::encode($model->username);

?>

<h1><?=$this->title; ?></h1>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'username',
        'role',
        'firstname',
        'middlename',
        'lastname',
        'company_name',
        'email',
        'phone',
        'address',
        'about',
    ],
]) ?>