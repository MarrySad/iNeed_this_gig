<?php
$auth = (\Yii::$app->user->isGuest) ? 'Войти' : 'Выйти';
?>


<nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="#">INEED_THIS_GIG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">&#9776;</span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Главная<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">Кнопка</a>
                    <a class="nav-item nav-link"
                       href="<?= (\Yii::$app->user->isGuest) ? \Yii::getAlias('@sign-in') : \Yii::getAlias('@log-out') ?>"><?= $auth ?></a>
                </div>
            </div>
</nav>