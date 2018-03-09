<?php
//the main page that dispatch the request to see other folders

// initialize the db connector
//require_once __DIR__. '../../Service/DbConnector.php :';


//we don't need the DBConnector directly
//the autoloader will lauch the dbConnector for the connexions
require_once __DIR__.'/../../vendor/autoload.php';

//initialize the config
$configs = require __DIR__.'/../../config/app.config.php';



//set the config into the db connector, it will only store the config
Service\DBConnector::setConfig($configs['db']);