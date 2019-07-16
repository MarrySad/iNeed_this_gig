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
$menuItems = [
    ['label' => 'Главная', 'url' => [\Yii::getAlias('@sign-in')]],
    ['label' => 'Кнопка', 'url' => [\Yii::getAlias('@sign-in')]],
    [
        'label' => $auth,
        'url' => [(\Yii::$app->user->isGuest) ? \Yii::getAlias('@sign-in') : \Yii::getAlias('@log-out')]
    ],

];
echo \yii\bootstrap4\Nav::widget([
    'items' => $menuItems,
    'options' => ['class' => 'navbar-nav navbar-collapse justify-content-end'],
]);
\yii\bootstrap4\NavBar::end();
?>