<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
	<title><?= Html::encode($this->context->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php $auth = (\Yii::$app->user->isGuest) ? 'Войти' : 'Выйти'; ?>
<div class="wrap">
    <!--    <div class="container">-->
    <div class="container-fluid">

        <header>
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
        </header>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <div>
            <?= $content ?>
        </div>
    </div>

	<!--    </div>-->
</div>

<footer class="mt-auto">
    <p id="copywrite">© 2019/ iNeed_this_gig. Все права защищены</p>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
