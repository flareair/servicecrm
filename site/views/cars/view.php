<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

$this->title = 'View car ' . Html::encode("$model->manufacturer $model->model");
?>

<h1><?=$this->title; ?></h1>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'manufacturer',
        'model',
        'year',
        'gov_number',
        'date_in',
        'date_out',
        'comment',
        [
            'label' => 'owner',
            'value' => $model->ownerprofile->firstname . ' ' . $model->ownerprofile->lastname
        ]
    ],
]) ?>