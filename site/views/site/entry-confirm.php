<?php

use yii\helpers\Html;
use Yii;

?>

<p class="lead">You have entered followind:</p>

<ul>
    <li>Your name: <?=Html::encode($model->name); ?></li>
    <li>Your email: <?=Html::encode($model->email); ?></li>
</ul>

<?php var_dump(Yii::$app->request->post()) ?>