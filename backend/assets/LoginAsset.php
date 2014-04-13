<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@cloudroot';
    public $baseUrl = '@cloud';
    public $css = [
        'css/cloud-admin.css',
        'font-awesome/css/font-awesome.min.css',
        'js/bootstrap-daterangepicker/daterangepicker-bs3.css',
        'js/uniform/css/uniform.default.min.css',
        'css/animatecss/animate.min.css',
        'myfiles/css/fonts_googleapis.css',
//        'myfiles/css/style.css',
        'myfiles/css/login.css',
    ];
    public $js = [
//        <!--[if lt IE 9]>
//\common\myhelpers\Debugger::debug($_SERVER['HTTP_USER_AGENT']);
//\common\myhelpers\Debugger::stop(get_browser($_SERVER['HTTP_USER_AGENT'], true));
        'js/flot/excanvas.min.js',
        'myfiles/js/html5.js',
        'myfiles/js/css3-mediaqueries.js',
//        <![endif]-->
        'js/jquery/jquery-2.0.3.min.js',
        'js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js',
        'bootstrap-dist/js/bootstrap.min.js',
        'js/uniform/jquery.uniform.min.js',
        'js/script.js',
        'myfiles/js/login.js',
    ];
//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];
}
