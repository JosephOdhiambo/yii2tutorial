<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Companies $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_start_date')->widget(\yii\jui\DatePicker::classname(), [
    'options' => [
        'class' => 'form-control',
    ],
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

    

    <?= $form->field($model, 'company_created_date')->widget(\yii\jui\DatePicker::classname(), [
    'options' => [
        'class' => 'form-control',
    ],
    'dateFormat' => 'yyyy-MM-dd',
]) ?>


    <?= $form->field($model, 'company_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
