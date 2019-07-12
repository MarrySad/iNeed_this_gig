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
 * @property string $password
 * @property string $password_repeat
 * @property bool $stayLogged
 * @property string $username
 */
class Users extends UsersBase implements IdentityInterface
{
    public $username;
    public $password;
    public $password_repeat;
    public $stayLogged;

    const SCENARIO_REGISTER = 'register';

    public function rules()
    {
        return array_merge([
            ['username', 'string'],
            ['email', 'email'],
            ['email', 'unique'],
            ['password', 'string'],
            ['stayLogged', 'boolean'],
            ['password_repeat', 'string'],
            ['password', 'required'],
            ['password_repeat', 'required', 'on' => self::SCENARIO_REGISTER],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ],parent::rules());
    }

    public function attributeLabels() {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'name' => 'Имя'
        ];
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return Users::find()->andWhere(['id' => $id])->one();
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
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
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
    public function getAuthKey()
    {
        return uniqid();
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return true;
    }
}