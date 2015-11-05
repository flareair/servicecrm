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
        'model',
        'gov_number',
        'date_in',
        [
            'label' => 'Owner',
            'format' => 'raw',
            'value' => function($data) {
                return Html::a(
                    Html::encode($data->ownerprofile->firstname . ' ' . $data->ownerprofile->lastname),
                    'users/view?id=' . $data->ownerprofile->id
                );
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn'
        ],
    ],
]); ?>