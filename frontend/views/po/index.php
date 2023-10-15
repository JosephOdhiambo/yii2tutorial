<?php

use frontend\models\ItemSearch;
use frontend\models\Po;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\grid\GridViewAsset;
GridViewAsset::register($this);
/** @var yii\web\View $this */
/** @var frontend\models\PoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="po-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Po', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'headerOptions' => ['class' => 'bi bi-three-dots-vertical'],
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model) {
                    $searchModel = new ItemSearch();
                    $searchModel->po_id = $model->id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_poitems', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                }
            ],

            'po_no',
            'description',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Po $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>


    <?php
    $this->registerJs(<<<JS
    $(document).ready(function() {
        $('.kv-grid-table tbody tr').find('td:first-child').addClass('bi bi-caret-right-square-fill');
    });
JS);
    ?>


</div>
