<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.07.2019
 * Time: 22:57
 */

namespace app\modules\user\controllers;


use app\base\BaseController;
use app\modules\user\controllers\actions\personalActions\PersonalInfoAction;

class PersonalController extends BaseController
{
    public $title = 'Личный кабинет';

    public function actions()
    {
        return [
            'info' => [
                'class' => PersonalInfoAction::class
            ],
        ];
    }
}