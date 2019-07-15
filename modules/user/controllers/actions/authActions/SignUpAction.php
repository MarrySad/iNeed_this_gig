<?php


namespace app\modules\user\controllers\actions\authActions;


use app\modules\user\components\UsersAuthComponent;
use app\modules\user\models\Users;
use app\modules\user\Module;
use yii\base\Action;

class SignUpAction extends Action {

    public function run() {
        $this->controller->title = 'Регистрация пользователя';
        /** @var Module $module */
        $module = \Yii::$app->getModule('user');

        /** @var UsersAuthComponent $component */
        $component = $module->get('users');

        /** @var Users $model */
        $model = $component->getModel()->setScenarioSignUp();

         if (\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post())) {
            $model = $component->getModel(\Yii::$app->request->post());
            if ($component->registerUser($model)) {
                return \Yii::$app->response->redirect(\Yii::getAlias('@sign-in'));
            }
        }

        return $this->controller->render('sign-up', ['model' => $model]);
    }

}