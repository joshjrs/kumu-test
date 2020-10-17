<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form yii\widgets\ActiveForm */

\backend\assets\BootstrapDatepickerAsset::register($this);
\backend\assets\BootstrapTimepickerAsset::register($this);
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'city')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'country')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'zip')->textInput() ?>

    <?= $form->field($model, 'date', [
        'template' => '<label>' . $model->getAttributeLabel('date') . '</label><div class="input-group date" id="datepicker" data-target-input="nearest">{input}<div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker"><div class="input-group-text"><i class="far fa-calendar"></i></div></div></div>',
        'inputOptions' => ['class' => 'form-control datetimepicker-input', 'data-toggle' => 'datetimepicker', 'data-target' => '#datepicker', 'autocomplete' => 'off']
    ])->textInput() ?>

    <?= $form->field($model, 'time', [
        'template' => '<label>' . $model->getAttributeLabel('time') . '</label><div class="input-group date" id="timepicker" data-target-input="nearest">{input}<div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker"><div class="input-group-text"><i class="far fa-clock"></i></div></div></div>',
        'inputOptions' => ['class' => 'form-control datetimepicker-input', 'data-toggle' => 'datetimepicker', 'data-target' => '#timepicker', 'autocomplete' => 'off']
    ])->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>