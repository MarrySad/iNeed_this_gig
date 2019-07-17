<?php

\app\assets\RegisterAsset::register($this);

use yii\bootstrap4\ActiveForm;
use \yii\helpers\Html;
//$ipInfo = file_get_contents('http://ip-api.com/json/' . \Yii::$app->request->userIP);
//$ipInfo = json_decode($ipInfo);
//$timezone = $ipInfo->timezone;
?>

<main class="d-inline-flex">
    <div class="registratsiya">
        <span class="registratsiya-span">Регистрация</span>

            <?php /** @var ActiveForm $form */ ?>
            <?php $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'title-form',
                    ],
            ]); ?>

<!--            <div class="form-group field-users-name required">-->
<!--                <input type="text" id="users-name" class="input-login-password" name="Users[name]"-->
<!--                       placeholder="Логин: " aria-required="true">-->

<!--            </div>-->
            <input type="hidden" name="_csrf"
                   value="-5UkERP8Y8MbRG8VWERi5YBdF0I_rlwxgpjxWdQs7ve51GFZSa4thSpyFi00NwndzDJ9dEnPaQPk4bQInW6mhA==">
            <div class="form-group field-users-email required">
<!--                <input type="text" id="users-email" class="input-login-password name" name="Users[email]"-->
<!--                       placeholder="Электронная почта" aria-required="true">-->
                <?= $form->field($model, 'email')
                    ->Widget(\yii\widgets\MaskedInput::class, [
                        'name' => 'input-36',
                        'clientOptions' => [
                            'alias' => 'email'
                        ]
                    ])
                    ->textInput(['placeholder' => 'Электронная почта', 'class' => 'input-login-password name'])
                    ->label(false) ?>
            </div>
            <div class="form-group field-users-password required">
<!--                <input type="password" id="users-password-one" class="input-login-password" name="Users[password]"-->
<!--                       placeholder="Пароль: " aria-required="true">-->
                <?= $form->field($model, 'password')
                    ->textInput()
                    ->label(false)
                    ->passwordInput(['placeholder' => 'Пароль', 'class' => 'input-login-password']); ?>

            </div>
            <div class="form-group field-users-password required">
<!--                <input type="password" id="users-password-two" class="input-login-password" name="Users[password]"-->
<!--                       placeholder="Повторите пароль: " aria-required="true">-->
                <?= $form->field($model, 'confirmPass')
                    ->textInput()
                    ->label(false)
                    ->passwordInput(['placeholder' => 'Повторите пароль', 'class' => 'input-login-password']); ?>
            </div>
            <p class="authorization">
                У вас уже есть аккаунт? <?= Html::a('Авторизуйтесь' , \Yii::getAlias('@sign-in')) ?>
            </p>
<!--            <button type="submit" class="form-button">Зарегистрироваться</button>-->
        <?= Html::submitButton('Регистрация', ['class' => 'form-button']); ?>

        <?php ActiveForm::end(); ?>
<!--        </form>-->
    </div>
</main>



