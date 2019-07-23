<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "time_zone".
 *
 * @property int $id
 * @property string $default_time_zone
 * @property string $time_zone
 *
 * @property Users[] $users
 */
class TimeZoneBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'time_zone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['default_time_zone'], 'required'],
            [['default_time_zone', 'time_zone'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'default_time_zone' => Yii::t('app', 'Default Time Zone'),
            'time_zone' => Yii::t('app', 'Time Zone'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['time_zone_id' => 'id']);
    }
}
