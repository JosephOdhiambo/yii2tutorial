<?php

use frontend\models\Companies;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\DatePicker;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var frontend\models\CompaniesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Create Companies', ['value' => Url::to('index.php?r=companies/create'),'class' => 'btn btn-success', 'id' =>'modalButton']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?php
    Modal::begin([
        'title'=>'<h4>Companies</h4>',
        'id'=> 'modal',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";

    Modal::end();
    ?>


    <?php
    Modal::begin([
        'title'=>'<h4>Update Companies</h4>',
        'id'=> 'modalCompanies',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";

    Modal::end();
    ?>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showOnEmpty' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'company_name',
            'company_email:email',
            'company_address',
            [
                'attribute' => 'company_created_date',
                'value' => 'company_created_date',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'company_created_date',
                    'options' => [
                        'class' => 'form-control',
                    ],
                    'dateFormat' => 'yyyy-MM-dd',
                ]),
            ],
            //'company_status',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Companies $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'company_id' => $model->company_id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
