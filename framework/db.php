<?php

namespace framework;

class db {
    public static $connection;
    public static function connect($db_server, $db_user, $db_pass) {
        error_log("db");
        if(!self::$connection){
            try{
                self::$connection = new \PDO($db_server, $db_user, $db_pass);
            } catch (\PDOException $e) {
                self::$connection = null;
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
}