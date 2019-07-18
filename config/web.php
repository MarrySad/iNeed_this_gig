<?php

$params = require __DIR__ . '/params.php';
$db = file_exists(__DIR__ . '/db_local.php') ? (require __DIR__ . '/db_local.php') : (require __DIR__ . '/db.php');

$config = [
    'language' => 'ru_RU',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@sign-in' => '/sign-in',
        '@sign-up' => '/sign-up',
        '@log-out' => '/log-out',
        '@info' => '/info',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '4reLvStPY4cCTJj7st5KuJkyU7NkK8Pm',
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::class,
        ],
        'rbac' => [
            'class' => \app\components\RbacComponent::class,
        ],
        'dao' => [
            'class' => \app\components\DaoComponent::class,
        ],
        'cache' => [
            //            'class' => 'yii\caching\FileCache',
            'class' => 'yii\caching\MemCache',
            'useMemcached' => true
        ],
        'user' => [
            'identityClass' => app\modules\user\models\Users::class,
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'menu' => [
            'class' => app\components\menuComponent::class
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'user/auth/sign-up',
                '/sign-up' => '/user/auth/sign-up',
                '/sign-in' => '/user/auth/sign-in',
                '/log-out' => '/user/auth/log-out',
                '/info' => '/user/auth/info',
            ],
        ],

    ],
    'modules' => [
        'user' => [
            'class' => app\modules\user\Module::class
        ],
        'calendar' => [
            'class' => 'app\modules\calendar\CalendarModule',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //        'allowedIPs' => ['82.151.209.202', '90.151.136.236'],
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
//        'allowedIPs' => ['82.151.209.202', '90.151.136.236'],
                'allowedIPs' => ['*'],
    ];
}

return $config;
