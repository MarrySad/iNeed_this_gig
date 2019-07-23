<?php

namespace app\modules\user\models;

use Yii;

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
 * @property int $time_zone_id
 *
 * @property TimeZone $timeZone
 */
class UsersBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeRegistry'], 'string'],
            [['email', 'passwordHash'], 'required'],
            [['dateRegistry', 'dateVisit', 'time_zone_id'], 'integer'],
            [['birthday'], 'safe'],
            [['family', 'name', 'patronymic'], 'string', 'max' => 60],
            [['email', 'authKey'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 22],
            [['passwordHash', 'authToken'], 'string', 'max' => 300],
            [['time_zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => TimeZone::className(), 'targetAttribute' => ['time_zone_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'family' => Yii::t('app', 'Family'),
            'name' => Yii::t('app', 'Name'),
            'patronymic' => Yii::t('app', 'Patronymic'),
            'typeRegistry' => Yii::t('app', 'Type Registry'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'passwordHash' => Yii::t('app', 'Password Hash'),
            'authToken' => Yii::t('app', 'Auth Token'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'dateRegistry' => Yii::t('app', 'Date Registry'),
            'dateVisit' => Yii::t('app', 'Date Visit'),
            'birthday' => Yii::t('app', 'Birthday'),
            'time_zone_id' => Yii::t('app', 'Time Zone ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimeZone()
    {
        return $this->hasOne(TimeZone::className(), ['id' => 'time_zone_id']);
    }
}
