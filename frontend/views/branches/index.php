<?php

use frontend\models\Branches;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
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

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            if ($model->branch_status === 'inactive') {
                return ['class' => 'alert alert-danger'];
            } else{
                return ['class' => 'alert alert-success'];
            }
        },

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                        [
                'attribute'=>'companies_company_id',
                'value'=>'companiesCompany.company_name'
            ],
            'branch_name',
            'branch_address',
            [
                'attribute' => 'branch_created_date',
                'value' => 'branch_created_date',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'branch_created_date',
                    'options' => [
                        'class' => 'form-control',
                    ],
                    'dateFormat' => 'yyyy-MM-dd',
                ]),
            ],
            'branch_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Branches $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'branch_id' => $model->branch_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
