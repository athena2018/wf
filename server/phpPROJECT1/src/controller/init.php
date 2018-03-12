<?php
//13 - Load the configuration


//launch the DBConnector for the connexions
require_once __DIR__.'/../../vendor/autoload.php';

// initialize the config
$configs = require __DIR__.'/../../config/app.config.php';

use Service\DBConnector;
//set the config into the db connector, it will only store the config
DBConnector::setConfig($configs['dB']);