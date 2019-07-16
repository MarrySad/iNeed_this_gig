<?php


namespace app\modules\user;


use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class Module extends \yii\base\Module {
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\user\controllers';

    /**
     * {@inheritdoc}
     */
    public function init() {
        parent::init();

        \Yii::configure($this, require __DIR__ . '/userModulConfog.php');
    }

//    public function behaviors() {
//        return [
//            'access' => [
//                'class' => AccessControl::class,
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'controllers' => ['user/auth'],
//                        'actions' => ['log-out'],
//                        'roles' => ['@']
//                    ],
//                ]
//            ]
//        ];
//    }
}