<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.07.2019
 * Time: 12:24
 */

namespace app\modules\user\components;

use app\modules\user\models\Users;
use yii\base\Component;

class UsersAuthComponent extends Component
{
    public $userModel;

    /**
     * @param null $params array
     * @return Users $model
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public function getModel($params = null)
    {
        /** @var Users $model */
        $model = \Yii::$container->get($this->userModel);

        if ($params && is_array($params)) {
            $model->load($params);
        }

        return $model;
    }

    /**
     * @param $model Users
     * @return bool true if success
     * @throws \yii\base\Exception
     */
    public function registerUser(&$model):bool
    {
        $model->dateRegistry = time();
        $model->passwordHash = \Yii::$app->security->generatePasswordHash($model->password);

        if (!$model->validate()) {
            return false;
        }

        if (!$model->save()) {
            return false;
        }

        return true;
    }
}