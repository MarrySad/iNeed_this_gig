<?php


namespace app\modules\user\controllers;


use app\base\BaseController;
use app\modules\user\controllers\actions\authActions\SignInAction;
use app\modules\user\controllers\actions\authActions\SignUpAction;


class AuthController extends BaseController {

    public function actions() {
        return [
            'sign-in' => [
                'class' => SignInAction::class
            ],
            'sign-up' => [
                'class' => SignUpAction::class
            ],
        ];
    }

}