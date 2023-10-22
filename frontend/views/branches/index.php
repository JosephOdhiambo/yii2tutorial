<?php

use frontend\models\Branches;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\jui\DatePicker;
use yii\bootstrap5\Modal;
/** @var yii\web\View $this */
/** @var frontend\models\BranchesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

echo Html::cssFile('@web/css/site.css');
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Create Branches', ['value' => Url::to(['branches/create']), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>

    </p>


    <?php
	Modal::begin([
		'title'=>'<h4>Branches</h4>',
		'id'=> 'modal',
		'size' => 'modal-lg',
	]);

	echo "<div id='modalContent'></div>";

	Modal::end();
?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


 <?php
//$gridColumns = [
//    'branch_address',
//    'branch_name',
//    'branch_created_date',
//    'branch_status'
//    ];
//
//    echo \kartik\export\ExportMenu::widget([
//            'dataProvider' => $dataProvider,
//        'columns' => $gridColumns
//    ]);
?>



    <?php
    $i=1;
    echo GridView::widget([
        'dataProvider'=>$dataProvider,
        'autoXlFormat'=>true,
        'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
        'export'=>[
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK
        ],
        'rowOptions' => function ($model, $key, $index, $grid) {
            if ($model->branch_status === 'inactive') {
                return ['class' => 'alert alert-danger'];
            } else{
                return ['class' => 'alert alert-success'];
            }
        },
        'columns'=>[
            [
                'attribute' => 'Branch Id',
                'value' => 'branch_id',
                'format' => 'text',
                'width' => '100px',

            ],
            [
                'attribute'=>'companies_company_id',
                'value'=>'companiesCompany.company_name',
                'format'=>'text',
                'width'=>'100px',
            ],
            [
                'attribute'=>'branch_name',
                'class' => 'kartik\grid\EditableColumn',
                'format'=>'text',
                'width'=>'120px'
            ],
            [
                'attribute'=>'branch_address',
                'value'=>'branch_address',
                'format'=>'text',
                'width'=>'100px',
            ],

            [
                'attribute'=>'branch_status',
                'value'=>'branch_status',
                'format'=>'text',
                'width'=>'100px',
            ],

            [
                'attribute'=>'branch_created_date',
                'value' => 'branch_created_date',
                'format'=>['datetime', 'php:d-M-y H:i:s'],
                'width'=>'140px'
            ]
        ],
        'pjax'=>true,
//        'showPageSummary'=>true,
        'panel'=>[
            'type'=>'primary',
            'heading'=>'Products'
        ]
    ]);
    ?>


</div>
