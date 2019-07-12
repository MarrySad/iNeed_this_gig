<?php


namespace app\modules\user\controllers\actions\authActions;


use app\modules\user\components\UsersAuthComponent;
use app\modules\user\models\Users;
use app\modules\user\Module;
use yii\base\Action;

class SignUpAction extends Action
{

    public function run()
    {
        /** @var Module $module */
        $module = \Yii::$app->getModule('user');

        /** @var UsersAuthComponent $component */
        $component = $module->get('users');

        /** @var Users $model */
        $model = $component->getModel();

        if (\Yii::$app->request->isPost) {
            $model = $component->getModel(\Yii::$app->request->post());
            $model->setScenario($model::SCENARIO_REGISTER);
            if ($component->registerUser($model)) {
                \Yii::$app->session->addFlash('success', 'Регистрация есть');
                return $this->controller->redirect('/sign-in');
            } else {
                \Yii::$app->session->addFlash('alert', 'Регистрации нет');
            }
        }

        return $this->controller->render('sign-up', ['model' => $model]);
    }

}