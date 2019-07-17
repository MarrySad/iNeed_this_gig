<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.07.2019
 * Time: 19:43
 */

namespace app\modules\calendar\controllers\actions;


use yii\base\Action;

class IndexAction extends Action
{
    public function run()
    {
        $this->controller->title = 'calendar';
        return $this->controller->render('index');
    }
}