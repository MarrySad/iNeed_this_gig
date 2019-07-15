<?php
\app\assets\AuthAsset::register($this);

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>

<?php
if ($model->errors) : ?>
    <?php foreach ($model->errors as $k => $v) : ?>
		<div class="alert alert-warning alert-dismissible fade show position-absolute" role="alert">
  <strong><?= $k ?>
	  : </strong> <?= $v[0] ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <?php endforeach; ?>
<?php endif ?>

<main class="d-inline-flex">

    <div class="authorization">
        <span class="authorization-span">авторизация</span>

        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'title-form',
            ],
        ]); ?>
        <?= $form->field($model, 'email')
                 ->Widget(\yii\widgets\MaskedInput::class, [
                     'name' => 'input-36',
                     'clientOptions' => [
                         'alias' => 'email'
                     ]
                 ])
                 ->textInput(['placeholder' => 'Электронная почта', 'class' => 'input-login-password name'])
                 ->label(false) ?>


        <?= $form->field($model, 'password')
                 ->passwordInput([
                     'class' => 'input-login-password',
                     'placeholder' => 'Пароль: '
                 ])
                 ->label(false); ?>

	    <p class="checkbox">
            <?= $form->field($model, 'stayLogged')
                     ->checkbox()
                     ->label('Оставаться в сети'); ?>
        </p>

        <p class="registratsiya">
            У вас еще нет аккаунта? Тогда пройдите
            процедуру <?= Html::a('регистрации', \Yii::getAlias('@sign-up')) ?>
        </p>
        <?= Html::submitButton('войти', ['class' => 'form-button']); ?>
        <?php ActiveForm::end(); ?>

    </div>
</main>



