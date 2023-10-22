<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use kartik\grid\GridViewAsset;
GridViewAsset::register($this);

use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php $this->beginBody() ?>
    <!-- Navbar -->
    <?php
    NavBar::begin([
    'brandLabel' => 'My Website',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-lg navbar-light bg-light',
    ],
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => 'Home', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Branches', 'url' => ['/branches'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Companies', 'url' => ['/companies'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Customers', 'url' => ['/customers'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Departments', 'url' => ['/departments'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Events', 'url' => ['/events'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Po', 'url' => ['/po'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Locations', 'url' => ['/locations'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Logoff', 'url' => ['/site/logout'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Logoff', 'url' => ['/site/logout'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],


    ],
]);

NavBar::end();


    ?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?php
        if(isset($this->params['test'])){
            echo $this->params['test'];
        }
        if(isset($this->blocks['advertisement'])){
            echo $this->blocks['advertisement'];
        }
        ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
