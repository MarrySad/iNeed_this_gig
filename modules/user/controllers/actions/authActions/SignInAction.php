<?php


namespace app\modules\user\controllers\actions\authActions;


use app\modules\user\components\UsersAuthComponent;
use app\modules\user\Module;
use yii\base\Action;
//use yii\bootstrap4\ActiveForm;
//use yii\web\Response;

class SignInAction extends Action
{
    public function run()
    {
        /** @var Module $module */
        $module = \Yii::$app->getModule('user');

        /** @var UsersAuthComponent $component */
        $component = $module->get('users');

        $model = $component->getModel();

        if (\Yii::$app->request->isPost) {
            $model = $component->getModel(\Yii::$app->request->post());
//            if (\Yii::$app->request->isAjax) {
//                \Yii::$app->response->format = Response::FORMAT_JSON;
//                return ActiveForm::validate($model);
//            }
            if ($component->userAuthentication($model)) {
                \Yii::$app->session->addFlash('success', 'Мы авторизованы');
                return $this->controller->redirect('/info');
            }
        }

        return $this->controller->render('index', ['model' => $model]);
    }

}