<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.07.2019
 * Time: 21:11
 */

namespace app\modules\calendar\components;

use app\modules\calendar\models\Activity;
use phpDocumentor\Reflection\Types\Array_;
use yii\base\Component;

class CalendarComponent extends Component
{
    /** @var Activity $activityModel */
    public $calendarModel;

    /**
     * @return Activity model
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public function getModel()
    {
        return \Yii::$container->get($this->calendarModel);
    }

    /**
     * @param $id activity
     * @return array with 1 activity
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public function getActivity($id)
    {
        return \Yii::$container->get($this->calendarModel)::find()->andWhere(['id' => $id])->one();
    }

    public function getActiveActivities()
    {
        return \Yii::$container->get($this->calendarModel)::find()->andWhere(['active' => 'active'])->all();
    }

    /**
     * @param $activity Activity
     * @return array|\yii\db\ActiveRecord[]
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public function getActivityToday()
    {
        return \Yii::$container->get($this->calendarModel)::find()->andWhere('date_time_activity >= :date',[':date' => date('Y-m-d')])->all();
    }
}