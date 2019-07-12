<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.07.2019
 * Time: 23:25
 */

namespace app\components;


use yii\base\Component;

class RbacComponent extends Component
{
    const RULE_ADMIN = 'admin';
    const RULE_USER = 'user';

    /**
     * @return \yii\rbac\ManagerInterface
     */
    public function getAuthManager()
    {
        return \Yii::$app->authManager;
    }

    public function generateRules()
    {
        $authManager = $this->getAuthManager();

        $authManager->removeAll();

        $admin = $authManager->createRole(self::RULE_ADMIN);
        $user = $authManager->createRole(self::RULE_USER);

        $authManager->add($admin);
        $authManager->add($user);
    }
}