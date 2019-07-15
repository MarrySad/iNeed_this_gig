<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.07.2019
 * Time: 23:25
 */

namespace app\components;


use yii\base\Component;

class RbacComponent extends Component {

    const ROLE = [
        [
            'user' => 'admin',
            'description' => 'Повелитель сайта'
        ],
        [
            'user' => 'user',
            'description' => 'Обычный пользоватлеь на сайте'
        ]
    ];

    public function generateRules() {
        $authManager = $this->getAuthManager();
        $authManager->removeAll();

        foreach (self::ROLE as $role) {
            $authManager->add($authManager->createRole($role['user'])->description->$role['description']);
        }
    }

    /**
     * @return \yii\rbac\ManagerInterface
     */
    public function getAuthManager() {
        return \Yii::$app->authManager;
    }
}