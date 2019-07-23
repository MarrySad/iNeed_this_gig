<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.07.2019
 * Time: 19:43
 */

namespace app\modules\calendar\controllers\actions;


use app\modules\calendar\components\CalendarComponent;
use app\modules\calendar\models\Activity;
use yii\base\Action;

class IndexAction extends Action
{
    public function run()
    {
        $this->controller->title = 'Заглушка';

        $module = \Yii::$app->getModule('calendar');
        /** @var CalendarComponent $component */
        $component = $module->get('calendar');

        /** @var Activity $model */
        $model = $component->getModel();

        $activity = $component->getActivityToday();

        return $this->controller->render('index', ['activity' => $activity]);
    }
}