<?php
// 11 - set the configuration

namespace config;

// store the application result more than the db control the process
// a kind of a bridge between the data and the view
return [  
 //define the configuration for all stored application
 //here we have the create the db configuration
    'db'=> [
        'driver'=>'mysql', //driver
        'host'=>'localhost', //host
        'dbname'=>'register', //register
        'dbuser'=>'root', //user
        'dbpass'=> null
    ]   
];