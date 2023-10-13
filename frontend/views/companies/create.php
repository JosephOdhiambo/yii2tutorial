<?php

use yii\helpers\Html;

use frontend\models\Branches;

/** @var yii\web\View $this */
/** @var frontend\models\Companies $model */
/** @var frontend\models\Branches $branch */ // Define the Branches model

$this->title = 'Create Companies';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'branch' => $branch,
    ]) ?>

</div>
