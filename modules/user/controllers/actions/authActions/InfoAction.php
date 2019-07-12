<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.07.2019
 * Time: 15:51
 */

namespace app\modules\user\controllers\actions\authActions;


use app\modules\user\components\UsersAuthComponent;
use app\modules\user\Module;
use yii\base\Action;
use yii\web\HttpException;

class InfoAction extends Action
{
    public function run()
    {
        /** @var Module $module */
        $module = \Yii::$app->getModule('user');

        /** @var UsersAuthComponent $component */
        $component = $module->get('users');

        $user = $component->getModel()::findIdentity(\Yii::$app->user->id);

        if (!$user) {
            throw new HttpException('401', 'Вы не авторизованы');
        }

        if (\Yii::$app->request->isPost) {
            \Yii::$app->user->logout();
            return $this->controller->redirect('/sign-in');
        }

        return $this->controller->render('info', ['user' => $user]);
    }
}