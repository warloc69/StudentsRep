<?php
/**
 * Created by PhpStorm.
 * User: warloc
 * Date: 28.08.2015
 * Time: 1:28
 */

namespace framework;


class ConfigHolder
{
    private static $info = array();
    public static function load() {
          self::$info = parse_ini_file("..\app\config.ini");
    }
    public static function getConfig($name) {
          return self::$info[$name];
    }
}