<?php
use yii\helpers\Html;

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<ul>
    <?php foreach ($this->params['comments'] as $comment): ?>
        <li><?= $comment['comment_name'] ?></li>
    <?php endforeach; ?>
</ul>
