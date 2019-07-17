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
        if (\Yii::$app->user->isGuest) {
            throw new HttpException('401', 'Вы не авторизованы');
        }
        return $this->controller->render('info');
    }
}