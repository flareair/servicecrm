<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\service\ServiceRecord */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'manufacturer') ?>
    <?= $form->field($model, 'model') ?>
    <?= $form->field($model, 'year') ?>
    <?= $form->field($model, 'gov_number') ?>
    <?= $form->field($model, 'date_in')->widget(DateTimePicker::className(), [
        'language' => 'en',
        'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => false,
        'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            'linkFormat' => 'yyyy-mm-dd HH:ii',
            'todayBtn' => true
        ]
    ]);?>

    <?= $form->field($model, 'date_out')->widget(DateTimePicker::className(), [
        'language' => 'en',
        'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => false,
        'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            'linkFormat' => 'HH:ii',
            'todayBtn' => true
        ]
    ]);?>

    <?= $form->field($model, 'comment')->textArea(['rows' => '6']) ?>
    <?= $form->field($model, 'owner')->dropDownList(
        ArrayHelper::map($users, 'id', 'username')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
