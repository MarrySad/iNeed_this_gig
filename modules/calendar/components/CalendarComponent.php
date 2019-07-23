<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.07.2019
 * Time: 21:11
 */

namespace app\modules\calendar\components;

use app\modules\calendar\models\Activity;
use yii\base\Component;

class CalendarComponent extends Component
{
    public $activityModel;

    /**
     * @return Activity model
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public function getModel()
    {
        return \Yii::$container->get($this->activityModel);
    }
}