<?php
// initialize all of the files
//make a bridge between all of them

require_once __DIR__.'/../../vendor/autoload.php';

$configs = require __DIR__.'/../../config/app.conf.php';

use Service\DBConnector;

DBConnector::setConfig($configs['db']);

