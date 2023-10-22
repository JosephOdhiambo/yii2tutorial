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
    <header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
              ['label' => 'Home', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Branches', 'url' => ['/branches/index'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Companies', 'url' => ['/companies/index'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Customers', 'url' => ['/customers/index'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Departments', 'url' => ['/departments/index'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Events', 'url' => ['/events/index'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Comments', 'url' => ['/branches/display-comments'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Po', 'url' => ['/po'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
        ['label' => 'Locations', 'url' => ['/locations'], 'linkOptions' => ['class' => 'nav-link d-none d-sm-inline-block']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>

    ?>

    </header>

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
