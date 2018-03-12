<?php
//13 - Load the configuration

namespace controller;

// initialize the config
$configs = require __DIR__.'/../../config/app.config.php';


//launch the DBConnector for the connexions
require_once __DIR__.'/../../vendor/autoload.php';

//set the config into the db connector, it will only store the config
Service\DBConnector::setConfig($configs['db']);