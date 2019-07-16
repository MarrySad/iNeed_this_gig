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

class UsersAuthComponent extends Component {
    /** @var Users $userModel */
    public $userModel;

    /**
     * @param null $params array
     * @return Users $model
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public function getModel($params = null) {
        /** @var Users $model */
        $model = \Yii::$container->get($this->userModel);
        return $model;
    }

    /**
     * @param $model Users
     * @return bool true if success
     * @throws \yii\base\Exception
     */
    public function registerUser(Users &$model): bool {
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
    public function userAuthentication(Users &$model): bool {

        if (!$model->validate(['email', 'password'])) {
            return false;
        }
        $user = $this->getUserByEmail($model->email);

        if (!$this->validatePassword($model->password, $user->passwordHash)) {
            $model->addError('password', 'Не правильный логин или пароль');
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
    private function getUserByEmail($email): Users {
        return Users::find()
                    ->andWhere(['email' => $email])
                    ->limit(1)
                    ->one();
    }

    /**
     * @param $password $model->password
     * @param $passwordHash passwordHash from table users
     * @return bool if success
     */
    private function validatePassword($password, $passwordHash): bool {
        return \Yii::$app->security->validatePassword($password, $passwordHash);
    }
}