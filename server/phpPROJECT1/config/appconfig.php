<?php

// create a connexion with the domain spacename
namespace config;

// we store in this file all the configuration connexions
return[

 
 
 // configuration of the first database we want to connect to, it will call the database
 
    dB=>[
            'driver'=>'mysql',
            'host'=>'localhost', // host where we want to connect
            'dbname'=>'registration', // the database name
            'dbuser'=> 'root',  // the connexion user
            'dbpass'=> 'null'   // the connexion password
            
          ]
    
];

