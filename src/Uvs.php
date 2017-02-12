<?php
/**
 * Created by PhpStorm.
 * User: Bestony
 * Date: 2017/2/12
 * Time: 10:19
 */

namespace YueCode\Uvs;


class Uvs
{
    const PKG_VERSION = '1.0.0';
    public static function getUA() {
        return 'QcloudPHP/'.self::PKG_VERSION.' ('.php_uname().')';
    }
}