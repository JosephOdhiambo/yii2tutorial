<?php

use frontend\models\Departments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var frontend\models\DepartmentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Departments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'branches_branch_id',
                'value'=>'branchesBranch.branch_name'
            ],
            'department_name',
            [
                'attribute'=>'companies_company_id',
                'value'=>'companiesCompany.company_name'
            ],
            'department_created_date',
            //'department_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Departments $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'department_id' => $model->department_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
