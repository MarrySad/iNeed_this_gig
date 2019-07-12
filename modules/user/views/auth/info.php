<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.07.2019
 * Time: 15:54
 */
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
?>

<?= $user->email ?>
<?php /** @var ActiveForm $form */ ?>
<?php $form = ActiveForm::begin(); ?>

<?= Html::submitButton('выйти', ['class' => 'btn btn-success']); ?>

<?php ActiveForm::end(); ?>
