<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17.03.14
 * Time: 21:07
 */

namespace common\myhelpers;

/**
 * Class Debugger
 * @package common\myhelpers
 * класс-отладчик кода
 */
class Debugger
{

    public static function debug($v)
    {
        echo '<pre style="background-color: #000; color: #fff; font-size: 14px;
                    font-weight: 600; line-height: 18px; margin: 20px;
                    padding: 20px; border: 3px solid #00FF40;  border-radius: 10px;">';
        var_dump($v);
        echo '</pre>';
    }

    public static function stop($v)
    {
        exit(self::debug($v));
    }

    public static function margin()
    {
        echo '<br /><br /><br /><br /><br />';
    }

} 