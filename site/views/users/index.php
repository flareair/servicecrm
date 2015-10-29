<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>

<h1>List of users</h1>

<?= Html::a('Create new user', ['create'], ['class' => 'btn btn-success']) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'summary' => 'Showing {begin}-{end} of {totalCount} users.',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'username',
        'role',
        'firstname',
        'lastname',
        'company_name',

        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ],
]); ?>