<?php

return [
    'components' => [
        'users' => [
            'class' => \app\modules\user\components\UsersAuthComponent::class,
            'userModel' => \app\modules\user\models\Users::class,
        ],
    ],
];
