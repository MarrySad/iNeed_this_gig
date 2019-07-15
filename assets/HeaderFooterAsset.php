<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.07.2019
 * Time: 11:19
 */

namespace app\assets;


use yii\web\AssetBundle;

class HeaderFooterAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/header_footer/style.css',
    ];
    public $js = [];
}