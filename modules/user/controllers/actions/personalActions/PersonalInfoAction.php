<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.07.2019
 * Time: 23:02
 */

namespace app\modules\user\controllers\actions\personalActions;

use yii\base\Action;

class PersonalInfoAction extends Action
{
    public function run()
    {

        return $this->controller->render('info');
    }
}