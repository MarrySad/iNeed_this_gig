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
    /** @var Users $userModel */
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

    /**
     * @param $model Users
     * @return bool true if success
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public function userAuthentication(&$model):bool
    {
        /** @var Users $user */
        $user = $this->getUserByEmail($model->email);

        if (!$user) {
            $model->addError('email', 'Нет такого ' . $model->email);
            return false;
        }

        if (!$this->validatePassword($model->password, $user->passwordHash)) {
            $model->addError('password', 'Пароль неправильный');
            return false;
        }

        if ($model->stayLogged) {
            \Yii::$app->user->enableAutoLogin = true;
        }

        $user->username = $user->email;

        return \Yii::$app->user->login($user);
    }

    /**
     * @param $email $model->email
     * @return mixed ActiveRecord array with user
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    private function getUserByEmail($email)
    {
        return \Yii::$container->get($this->userModel)::find()->andWhere(['email' => $email])->one();
    }

    /**
     * @param $password $model->password
     * @param $passwordHash passwordHash from table users
     * @return bool if success
     */
    private function validatePassword($password, $passwordHash):bool
    {
        return \Yii::$app->security->validatePassword($password, $passwordHash);
    }
}