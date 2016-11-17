<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Supplier;
//use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_pic')->textInput(['maxlength' => true]) ?>
		
	<?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_sprice')->textInput() ?>

    <?= $form->field($model, 'item_rprice')->textInput() ?>

    <?= $form->field($model, 'item_onHand')->textInput() ?>

    <?= $form->field($model, 'Logs_id')->textInput() ?>
	
	<?= $form->field($model, 'Supplier_id')->dropDownList(
                ArrayHelper::map(Supplier::find()->all(), 'id', 'SFullname' ),
                ['prompt'=>'Select a Supplier']				
	)?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
