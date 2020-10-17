<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Guest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guest-form">
    <h2 class="mb-3">Registration</h2>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($guestModel, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($guestModel, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($guestModel, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($guestModel, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($guestModel, 'gender')->dropDownList($guestModel->getGenderLabels()) ?>

    <?= $form->field($guestModel, 'street')->textarea(['rows' => 6]) ?>

    <?= $form->field($guestModel, 'city')->textarea(['rows' => 6]) ?>

    <?= $form->field($guestModel, 'country')->textarea(['rows' => 6]) ?>

    <?= $form->field($guestModel, 'zip')->textInput() ?>

    <?php ActiveForm::end(); ?>

</div>