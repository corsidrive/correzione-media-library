<?php

class Db {

    private static $instance = null;

    private function __construct() {}

    public static function getInstance():PDO {
      
        if(self::$instance === null){

            self::$instance = new PDO("mysql:host=".Config::DB_HOST."; dbname=".Config::DB_NAME, Config::DB_USER, Config::DB_PASSWORD);
            return self::$instance;
        } else {
            
            return self::$instance;
        }

    }

} ?>