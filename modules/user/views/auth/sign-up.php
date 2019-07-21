<?php

\app\modules\user\assets\RegisterAsset::register($this);
use yii\bootstrap4\ActiveForm;
use \yii\helpers\Html;

//$ipInfo = file_get_contents('http://ip-api.com/json/' . \Yii::$app->request->userIP);
//$ipInfo = json_decode($ipInfo);
//$timezone = $ipInfo->timezone;

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
    <div class="registratsiya">
        <span class="registratsiya-span">Регистрация</span>

            <?php /** @var ActiveForm $form */ ?>
            <?php $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'title-form',
                    ],
                'fieldConfig' => [
//                    'errorOptions' => ['class' => 'alert-warning']
                ],
            ]); ?>

            <input type="hidden" name="_csrf"
                   value="-5UkERP8Y8MbRG8VWERi5YBdF0I_rlwxgpjxWdQs7ve51GFZSa4thSpyFi00NwndzDJ9dEnPaQPk4bQInW6mhA==">
            <div class="form-group field-users-email required">

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

                <?= $form->field($model, 'password', [
                    'template' => "{input}\n{error}",
                    'errorOptions' => [
                        'class' => 'alert-warning'
                    ]
                ])
                    ->textInput()
                    ->label(false)
                    ->passwordInput(['placeholder' => 'Пароль', 'class' => 'input-login-password']); ?>

            </div>
            <div class="form-group field-users-password required">

                <?= $field = $form->field($model, 'confirmPass', [
                        'template' => "{input}\n{error}",
                        'errorOptions' => [
                                'class' => 'alert-warning'
                        ]
                ])
                    ->textInput()
                    ->label(false)
                    ->passwordInput(['placeholder' => 'Повторите пароль', 'class' => 'input-login-password']); ?>
            </div>
            <p class="authorization">
                У вас уже есть аккаунт? <?= Html::a('Авторизуйтесь' , \Yii::getAlias('@sign-in')) ?>
            </p>

        <?= Html::submitButton('Регистрация', ['class' => 'form-button']); ?>

        <?php ActiveForm::end(); ?>


    </div>
</main>



