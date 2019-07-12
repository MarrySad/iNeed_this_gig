<?php
\app\assets\authAsset::register($this);

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>

<main>
    <div class="authorization">
        <span class="authorization-span">авторизация</span>

        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'title-form',
            ],
//            'fieldConfig' => [
//                'enableAjaxValidation' => TRUE,
//            ],
        ]); ?>

        <?= $form->field($model, 'email')->textInput([
            'class' => 'input-login-password name',
            'placeholder' => 'Логин: ',
        ])->label(false); ?>

        <?= $form->field($model, 'password')->passwordInput([
            'class' => 'input-login-password',
            'placeholder' => 'Пароль: '
        ])->label(false); ?>

        <p class="checkbox">
            <?= $form->field($model, 'stayLogged')->checkbox()->label('Оставаться в сети'); ?>
        </p>

        <p class="registratsiya">
            У вас еще нет аккаунта? Тогда пройдите
            процедуру <?= Html::a('регистрации', '/sign-up') ?>
        </p>
        <?= Html::submitButton('войти', ['class' => 'form-button']); ?>
        <?php ActiveForm::end(); ?>

    </div>
</main>



