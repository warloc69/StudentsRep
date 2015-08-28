<?php

namespace framework;

class db {
    public static $connection;
	/**
	*returns connection to DB
	* $db_server - connection string. example = "mysql:host=localhost;dbname=students" 
	* $db_user - user name
	* $db_pass - password
	*/
    public static function connect($db_server, $db_user, $db_pass) {
        if(!self::$connection){
            try{
                self::$connection = new \PDO($db_server, $db_user, $db_pass);
            } catch (\PDOException $e) {
                self::$connection = null;
                error_log($e->getMessage());
            }
        }
        return self::$connection;
    }
}