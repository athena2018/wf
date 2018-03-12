<?php
// an implementation of singleton where each class is private
namespace Service;
//cant' work without the db connexion


class DBConnector
{
    
  // set config 
    private static $config;
    private static $connection;
    public static function setConfig(array $config){
 //set the config       
        self::$config = $config;
    }
//we can't have a global connection, the global connexion will be set in the public static function getconnection()
//must create the connexion
// store the given configuration. This configuration must contain a host, driver, dbname, dbuser, dbpass keys
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
    //get the connexion
//we can't yet get the connexion because of the private static $config
//we must create a get request = call the get connexion in a public connexion because it is come from outside from the user
//to get the private connection for more security
    public static function getConnection(){
    //the db connector return the connexion
    // return void
        if(!self::$connection){
            self::createConnection();
        }
        return self::$connection;
    }





// have it as one instance

//need a main file to dispatch the request to see other folder : the init.php

}


