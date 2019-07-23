<?php


namespace app\modules\user\models;


use app\modules\user\models\UsersBase;
use yii\base\Model;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "Users".
 *
 * @property int $id
 * @property string $family Фамилия
 * @property string $name Имя
 * @property string $patronymic Отчество
 * @property string $typeRegistry
 * @property string $email Email  клиента оставившего заказ
 * @property string $phone Телефон клиента оставившего заказ
 * @property string $passwordHash Хеш пароля
 * @property string $authToken На будущее создадим
 * @property string $authKey тоже на будущее
 * @property int $dateRegistry Дата регистрации юзера на сайте
 * @property int $dateVisit Дата последнего входа на сайт
 * @property string $birthday Дата рождения клиента
 */


class Users extends UsersBase implements IdentityInterface {

    const SCENARIO_SIGNUP = 'signup'; #Регистрация
    const SCENARIO_SIGNIN = 'signin'; #Авторизация

    public $username;
    public $password;
    public $confirmPass;
    public $stayLogged;

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id) {
        return Users::find()
                    ->andWhere(['id' => $id])
                    ->one();
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function setScenarioSignUp() {
        $this->setScenario(self::SCENARIO_SIGNUP);
        return $this;
    }

    public function setScenarioSignIn() {
        $this->setScenario(self::SCENARIO_SIGNIN);
        return $this;
    }

    public function rules() {
        return array_merge([
            [['confirmPass', 'password'], 'string', 'min' => 6, 'on' => self::SCENARIO_SIGNUP],
            ['email', 'email', 'message' => 'Введите корректно ваш Email!'],
            [['email'], 'unique', 'on' => self::SCENARIO_SIGNUP],
            [['email'], 'exist', 'on' => self::SCENARIO_SIGNIN],
            ['stayLogged', 'boolean'],
            [['password', 'email'], 'required'],
            ['confirmPass', 'required', 'on' => self::SCENARIO_SIGNUP],
            ['confirmPass', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают!', 'on' => self::SCENARIO_SIGNUP],
        ], parent::rules());
    }

    public function attributeLabels() {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
            'confirmPass' => 'Повторите пароль',
            'name' => 'Имя'
        ];
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername() {
        return $this->email;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled. The returned key will be stored on the
     * client side as a cookie and will be used to authenticate user even if PHP session has been expired.
     *
     * Make sure to invalidate earlier issued authKeys when you implement force user logout, password change and
     * other scenarios, that require forceful access revocation for old sessions.
     *
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey() {
        return $this->authKey;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey): bool {
        return $this->authKey == $authKey;
    }
}