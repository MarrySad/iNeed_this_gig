<?php

namespace app\modules\calendar\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title Название события
 * @property string $description Описание события
 * @property string $active
 * @property string $date_time_activity
 * @property string $date_created
 * @property string $payment
 * @property int $employer_id
 * @property int $user_id
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'date_time_activity', 'user_id'], 'required'],
            [['active', 'payment'], 'string'],
            [['date_time_activity', 'date_created'], 'safe'],
            [['employer_id', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'active' => Yii::t('app', 'Active'),
            'date_time_activity' => Yii::t('app', 'Date Time Activity'),
            'date_created' => Yii::t('app', 'Date Created'),
            'payment' => Yii::t('app', 'Payment'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }
}
