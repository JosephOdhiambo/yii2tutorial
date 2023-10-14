<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/** @var yii\web\View $this */
/** @var frontend\models\Po $model */
/** @var yii\widgets\ActiveForm $form */
/** @var frontend\models\Po $modelsPoItem */
?>


<div class="po-form">
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'po_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>


    <div class="form-control my-2">
        <div class="card">
            <div class="card-header">
                <h4><i class="bi bi-envelope"></i> Po Items</h4> <!-- Replace glyphicon class with Bootstrap 5 icon class -->
            </div>
            <div class="card-body">
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper',
                    'widgetBody' => '.container-items',
                    'widgetItem' => '.item',
                    'limit' => 10,
                    'min' => 1,
                    'insertButton' => '.add-item',
                    'deleteButton' => '.remove-item',
                    'model' => $modelsPoItem[0],
                    'formId' => 'dynamic-form',
                    'formFields' => ['po_item_no', 'quantity'],
                ]); ?>

                <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelsPoItem as $i => $modelPoItem): ?>
                        <div class="item card"><!-- widgetBody -->
                            <div class="card-header">
                                <h3 class="card-title">Po Item</h3>
                                <div class="float-end">
                                    <button type="button" class="add-item btn btn-success btn-md"><i class="bi bi-plus-square-fill"></i></button>
                                    <button type="button" class="remove-item btn btn-danger btn-md"><i class="bi bi-dash-square"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php
                                // necessary for the update action.
                                if (!$modelPoItem->isNewRecord) {
                                    echo Html::activeHiddenInput($modelPoItem, "[{$i}]id");
                                }
                                ?>
                                <?= $form->field($modelPoItem, "[{$i}]po_item_no")->textInput(['maxlength' => true]) ?>
                                <div class="row">
                                    <div class="col-6"> <!-- Replace col-sm-6 with col-6 for Bootstrap 5 -->
                                        <?= $form->field($modelPoItem, "[{$i}]quantity")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>




