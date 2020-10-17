<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CustomPagerAsset extends AssetBundle
{
    public $basePath = '@webroot/custompager';
    public $baseUrl = '@web/custompager';
    public $css = [
        'custompager.css'
    ];
    public $js = [
        'custompager.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
