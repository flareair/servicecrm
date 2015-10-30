<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'newPassword')->passwordInput() ?>
    <?= $form->field($model, 'repeatPassword')->passwordInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Change', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>