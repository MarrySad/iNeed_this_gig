<?php

\app\assets\AuthAsset::register($this);

use yii\bootstrap4\ActiveForm;
use \yii\helpers\Html;

?>

<div class="container">
<div class="col-md-4">
        <?php /** @var ActiveForm $form */ ?>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'email')
                 ->Widget(\yii\widgets\MaskedInput::class, [
                     'name' => 'input-36',
                     'clientOptions' => [
                         'alias' => 'email'
                     ]
                 ])
                 ->textInput(['placeholder' => 'Электронная почта'])
                 ->label(false) ?>
        <?= $form->field($model, 'password')->textInput()->label(false)
                 ->passwordInput(['placeholder' => 'Пароль']); ?>
        <?= $form->field($model, 'confirmPass')->textInput()->label(false)
                 ->passwordInput(['placeholder' => 'Повторите пароль']); ?>
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']); ?>

        <?php ActiveForm::end(); ?>
    </div>
	</div>