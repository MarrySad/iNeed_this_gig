<?php

namespace app\modules\calendar;

/**
 * calendar module definition class
 */
class CalendarModule extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\calendar\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        \Yii::configure($this, require __DIR__ . '/calendarModuleConfig.php');
    }
}
