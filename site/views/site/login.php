<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login | Service CRM'

?>
<h2>Please sing in</h2>
<?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'username'); ?>
    <?=$form->field($model, 'password')->passwordInput(); ?>
    <?=$form->field($model, 'rememberMe')->checkbox(); ?>

    <?=Html::submitButton('Log in', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>