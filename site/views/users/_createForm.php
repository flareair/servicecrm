<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\service\ServiceRecord */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    <?php if (Yii::$app->user->can('manageAccounts')): ?>
    <?= $form->field($model, 'role')->dropDownList(
        [
            'user' => 'user',
            'serviceman' => 'serviceman',
            'admin' => 'admin',
        ]
    ) ?>
    <? endif; ?>
    <?= $form->field($model, 'firstname') ?>
    <?= $form->field($model, 'middlename') ?>
    <?= $form->field($model, 'lastname') ?>
    <?= $form->field($model, 'company_name') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'phone') ?>
    <?= $form->field($model, 'address')->textArea(['rows' => '3']) ?>
    <?= $form->field($model, 'about')->textArea(['rows' => '6']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
