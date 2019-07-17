<?php


namespace app\modules\user\controllers\actions\authActions;


use app\modules\user\components\UsersAuthComponent;
use app\modules\user\models\Users;
use app\modules\user\Module;
use yii\base\Action;

class SignInAction extends Action {
    /**
     * @return string|\yii\console\Response|\yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public function run() {
        $this->controller->title = 'Авторизация ';

        /** @var UsersAuthComponent $component */
       $model = \Yii::createObject(Users::class)->setScenarioSignIn();

        if (\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post())) {
            if ($this->getAuthComponent()->userAuthentication($model)) {
                return \Yii::$app->response->redirect(\Yii::getAlias('@info'));
            }
        }

        return $this->controller->render('sign-in', compact('model'));
    }

        /** @return UsersAuthComponent */
    private function getAuthComponent() {
        return \Yii::createObject(UsersAuthComponent::class);
    }



}