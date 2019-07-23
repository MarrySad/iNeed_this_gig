<?php
$auth = (\Yii::$app->user->isGuest) ? 'Войти' : 'Выйти(' . \Yii::$app->user->identity->email . ')';
?>


<?php

\yii\bootstrap4\NavBar::begin([
    'brandLabel' => 'INEED_THIS_GIG',
    'brandUrl' => Yii::$app->homeUrl,
    'renderInnerContainer' => false,
    'togglerContent' => '<span class="navbar-toggler-icon">&#9776;</span>',
    'options' => [
        'class' => 'navbar navbar-expand-md',
    ],
]);

echo \yii\bootstrap4\Nav::widget([
    'items' => \Yii::$app->menu->menu,
    'options' => ['class' => 'navbar-nav navbar-collapse justify-content-end'],
]);
\yii\bootstrap4\NavBar::end();
?>