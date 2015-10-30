<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Change password for user ' . Html::encode($userName);
?>

<h1><?=$this->title; ?></h1>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'newPassword')->passwordInput() ?>
    <?= $form->field($model, 'repeatPassword')->passwordInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Change', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>