<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.07.2019
 * Time: 23:33
 */

namespace app\commands;


use yii\console\Controller;
use yii\helpers\Console;

class RbacController extends Controller
{
    public function actionIndex()
    {
        \Yii::$app->rbac->generateRules();
        $this->stdout("Rbac готов".PHP_EOL, Console::FG_GREEN);
    }
}