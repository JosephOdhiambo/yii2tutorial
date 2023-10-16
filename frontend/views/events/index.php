<?php
use frontend\models\Event;
use frontend\controllers\EventsController;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
use yii\widgets\Pjax;
use yii2fullcalendar\yii2fullcalendar;

$events = Yii::$app->params['events'];


/** @var yii\web\View $this */
/** @var frontend\models\EventSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Events';
$this->params['breadcrumbs']['event'] = $this->title;


?>
<div class="event-index">

    <?php
    Modal::begin([
        'title'=>'<h4>events</h4>',
        'id'=> 'modal',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";

    Modal::end();
    ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= yii2fullcalendar::widget([
    'options' => [
        // Any options you want to pass to the fullCalendar JavaScript widget
    ],
    'events' => $events, // Pass the 'events' array here
]);

    ?>



</div>
