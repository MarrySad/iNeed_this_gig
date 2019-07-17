<?php

namespace app\modules\calendar\controllers;

use app\modules\calendar\controllers\actions\IndexAction;
use yii\web\Controller;

/**
 * Default controller for the `calendar` module
 */
class DefaultController extends Controller
{
    public $title = 'Календарь';

    public function actions()
    {
        return [
            'index' => ['class' => IndexAction::class]
        ];
    }
}
