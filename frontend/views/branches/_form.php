<?php

use bizley\ajaxdropdown\AjaxDropdown;
use yii\jui\DatePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Companies;

/** @var yii\web\View $this */
/** @var frontend\models\Branches $model */
/** @var yii\widgets\ActiveForm $form */
?>


<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'companies_company_id')->dropDownList(
            ArrayHelper::map(Companies::find()->all(), 'company_id','company_name'),
            ['prompt'=>'Select Company']
    ) 
    ?>



    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_created_date')->widget(DatePicker::class, [
        'options' => [
            'class' => 'form-control',
        ],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'branch_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
