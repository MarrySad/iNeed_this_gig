<?php

?>

<?= 'Модуль: ' . \Yii::$app->controller->module->id ?>
<br>
<?= 'Контроллер: ' . \Yii::$app->controller->id ?>
<br>
<?= 'Экшен: ' . \Yii::$app->controller->action->id ?>


<?= yii\bootstrap4\Progress::widget([
    'bars' => [
        ['percent' => 70, 'options' => ['class' => 'bg-success progress-bar-animated progress-bar-striped']]
    ]
]) ?>


