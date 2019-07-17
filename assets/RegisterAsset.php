<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.07.2019
 * Time: 18:21
 */

namespace app\assets;


use yii\web\AssetBundle;

class RegisterAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/css/modules/user/auth';
    public $css = [
        'css.css',
    ];
    public $js = [];
}