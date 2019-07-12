<?php


namespace app\modules\user\controllers;


use app\base\BaseController;
use app\modules\user\controllers\actions\authActions\InfoAction;
use app\modules\user\controllers\actions\authActions\SignInAction;
use app\modules\user\controllers\actions\authActions\SignUpAction;
use yii\web\HttpException;


class AuthController extends BaseController {

    public function actions() {
        return [
            'sign-in' => [
                'class' => SignInAction::class
            ],
            'sign-up' => [
                'class' => SignUpAction::class
            ],
            'info' => [
                'class' => InfoAction::class
            ],
        ];
    }

    public function actionLogOut() {
        if(!\Yii::$app->user->isGuest) {
            \Yii::$app->user->logout();
            return $this->goHome();
        }

        throw new HttpException(401, 'Вы не авторизованы');

    }

}