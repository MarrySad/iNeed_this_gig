<?php


namespace app\modules\user\controllers\actions\authActions;


use yii\base\Action;

class SignInAction extends Action {

    public function run(){
        return $this->controller->render('index');
    }

}