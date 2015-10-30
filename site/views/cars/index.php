<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'List of cars';

?>

<h1><?=$this->title ?></h1>

<?= Html::a('Create new car', ['create'], ['class' => 'btn btn-success']) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'summary' => 'Showing {begin}-{end} of {totalCount} cars.',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'manufacturer',
        // 'role',
        // 'firstname',
        // 'lastname',
        // 'company_name',
        [
            'class' => 'yii\grid\ActionColumn'
        ],
    ],
]); ?>