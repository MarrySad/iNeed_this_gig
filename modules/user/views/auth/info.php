<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.07.2019
 * Time: 15:54
 */
use yii\helpers\Html;
?>

<h3><?= \Yii::$app->user->identity->email ?></h3>
<?= Html::a('Выйти', ['log-out'],  ['class' => 'btn btn-success']); ?>
