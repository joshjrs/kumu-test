<?php

namespace backend\assets;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class BootstrapDatepickerAsset extends AssetBundle
{
    public $basePath = '@webroot/bootstrap-datepicker';
    public $baseUrl = '@web/bootstrap-datepicker';
    public $css = [
        'bootstrap-datepicker.min.css'
    ];

    public $js = [
        'bootstrap-datepicker.min.js'
    ];

    public $depends = [
        JqueryAsset::class
    ];
}
