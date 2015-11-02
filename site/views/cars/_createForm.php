<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\service\ServiceRecord */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'manufacturer') ?>
    <?= $form->field($model, 'model') ?>
    <?= $form->field($model, 'year') ?>
    <?= $form->field($model, 'date_in') ?>
    <?= $form->field($model, 'date_out') ?>
    <?= $form->field($model, 'comment')->textArea(['rows' => '6']) ?>
    <?= $form->field($model, 'owner')->dropDownList(
        ArrayHelper::map($users, 'id', 'username')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
