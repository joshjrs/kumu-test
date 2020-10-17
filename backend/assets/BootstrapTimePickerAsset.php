<?php

namespace backend\assets;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class BootstrapTimepickerAsset extends AssetBundle
{
    public $basePath = '@webroot/bootstrap-timepicker';
    public $baseUrl = '@web/bootstrap-timepicker';
    public $css = [
        'bootstrap-timepicker.min.css'
    ];

    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js',
        'bootstrap-timepicker.min.js'
    ];

    public $depends = [
        JqueryAsset::class
    ];
}
