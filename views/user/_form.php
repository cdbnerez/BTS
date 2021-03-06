<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_type')->dropDownList(['Administrator' => 'Administrator', 'Standard User' => 'Standard User'],['prompt'=>'Select User Type']) ?>

    <?= $form->field($model, 'user_pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
