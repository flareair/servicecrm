<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>

<h1>List of users</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'summary' => 'Showing {begin}-{end} of {totalCount} users.',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'username',
        'password',

        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ],
]); ?>