<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Po $model */
/** @var frontend\models\Po $model */
/** @var frontend\models\Po $modelsPoItem */

$this->title = 'Create Po';
$this->params['breadcrumbs'][] = ['label' => 'Pos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="po-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPoItem' => $modelsPoItem,
    ]) ?>

</div>

