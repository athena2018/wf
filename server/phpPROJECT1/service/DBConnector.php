<?php
//12- set the configuration connexion

namespace Service;

// we set the DataBase connexion for sending all the input datas and call this file for the connexion to the databse

class DBConnector{
// set the config

    private static $config;
    private static $connection;
    public static function setConfig(array $config){
       
        self::$config = $config;
    }
    
    private static function createConnection(){
       
            //create the string following the format
        $dsn = sprintf(
            '%s:host=%s;dbname=%s',
            self::$config['driver'], // first string in the driver
            self::$config['host'], // host key
            self::$config['dbname'] //dbname key
            );
        
 //must create the connexion and the domain space name to store the new connexion into a property
//store the connexion as static = create a static connection
        self::$connection = new \PDO(
            $dsn,
            self::$config['dbuser'], //user key
            self::$config['dbpass'] // pass key
            );
    }
    
    
    public static function getConnection(){
        
        
        if(!self::$connection){
            self::createConnection();
        }
        
        return self::$connection;
    }
    
    
    
}

// need to create an init.php to dispatch all the different requests

