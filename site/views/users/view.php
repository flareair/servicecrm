<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
?>

<h1>User <?= Html::encode($model->username) ?></h1>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'username',
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