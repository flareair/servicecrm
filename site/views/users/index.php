<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'List of users';

?>

<h1><?=$this->title ?></h1>

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
            'template'=>'{view}{update}{changepassword}{delete}',
            'headerOptions' => ['width' => '80'],
            'buttons' => [
                'changepassword' => function($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-cog"></span>', $url, ['title' => 'Change Password']);
                },
            ]
        ],
    ],
]); ?>