<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.07.2019
 * Time: 21:13
 */

return [
    'components' => [
        'calendar' => [
            'class' => \app\modules\calendar\components\CalendarComponent::class,
            'calendarModel' => \app\modules\calendar\models\Activity::class,
        ],
    ],
];