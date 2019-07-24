<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.07.2019
 * Time: 23:32
 */

namespace app\modules\user\assets;


use yii\web\AssetBundle;

class PersonalAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/css/modules/user/personal';
    public $css = [
        'authorization.css',
    ];
    public $js = [];
}