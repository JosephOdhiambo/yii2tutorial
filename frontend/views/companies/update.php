<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Companies $model */
/** @var frontend\models\Branches $branch */ // Define the Branches model

$this->title = 'Update Companies: ' . $model->company_id;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->company_id, 'url' => ['view', 'company_id' => $model->company_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="companies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'branch' => $branch,
    ]) ?>

</div>
