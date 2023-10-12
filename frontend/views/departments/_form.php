<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Companies;
use frontend\models\Branches;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var frontend\models\Departments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>
   <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'companies_company_id')->dropDownList(
        ArrayHelper::map(Companies::find()->all(), 'company_id', 'company_name'),
        [
            'prompt' => 'Select Company',
            'onchange' => <<<JS
            $.post("index.php?r=branches/lists&id=" + $(this).val(), function(data) {
                console.log(data);
                $("select#departments-branches_branch_id").html(data);
            });
        JS
        ]
    ) ?>

    <?= $form->field($model, 'branches_branch_id')->dropDownList(
        ArrayHelper::map(Companies::find()->all(), 'branch_id', 'branch_name'),
        [
            'prompt' => 'Select Branch',
        ]
    ) ?>

    <?= $form->field($model, 'department_created_date')->widget(DatePicker::class, [
        'options' => [
            'class' => 'form-control',
        ],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'department_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

