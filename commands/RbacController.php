<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.07.2019
 * Time: 23:33
 */

namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionIndex()
    {
        \Yii::$app->rbac->generateRules();
        echo 'seems like rules has been generated, check it out' . PHP_EOL;
    }
}