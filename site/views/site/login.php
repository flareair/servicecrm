<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'username'); ?>
    <?=$form->field($model, 'password')->passwordInput(); ?>
    <?=$form->field($model, 'rememberMe')->checkbox(); ?>

    <?=Html::submitButton('Log in', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>