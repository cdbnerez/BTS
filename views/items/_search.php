<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'item_name') ?>

    <?= $form->field($model, 'item_brand') ?>

    <?= $form->field($model, 'item_desc') ?>

    <?= $form->field($model, 'item_sprice') ?>

    <?php // echo $form->field($model, 'item_rprice') ?>

    <?php // echo $form->field($model, 'item_onHand') ?>

    <?php // echo $form->field($model, 'item_pic') ?>

    <?php // echo $form->field($model, 'Logs_id') ?>

    <?php // echo $form->field($model, 'Supplier_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
