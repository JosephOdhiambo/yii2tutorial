<?php

use frontend\models\Locations;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Customers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_code')->dropDownList(
        ArrayHelper::map(Locations::find()->all(), 'location_id','zip_code'),
        [
                'id' => 'zipCode',
                'prompt'=>'Select Zip Code',
        ]
    )
    ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
//here you write all your JavaScript stuff
$('#zipCode').change(function(){
    var zipId = $(this).val();
    $.get('index.php?r=locations/get-city-province', { zipId: zipId }, function(data){
        var data = $.parseJSON(data);
        alert(data.city);
        $('#customers-city').attr('value', data.city);
        $('#customers-province').attr('value', data.province);
    });	
});
JS;
$this->registerJs($script);
?>
