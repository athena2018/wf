<?php
// 14- install composer

// 16 - require all the files
require_once __DIR__.'/./..vendor/autoload.php';
$configs = require __DIR__.'/../config/app.config.php';

use Service\DBConnector;
DBConnector::setConfig($configs['db']);


//must make a mapping
$map = [
    '/account' => __DIR__.'/../src/controller/account.php',
    ''=> __DIR__ . '/../src/Controller/index.php',
    'register' => __DIR__ .'/../src/Controller/register.php'
]





//the url = have the current request of the url

$url = $_SERVER['REQUEST_URI'];
//change the apache, entry port = public

// we create a rout between a mapping and a controller
if (substr($url,0, strlen ('index.php')) == '/index.php') {
    $url = substr ($url, strlen('/index.php'));
} else if ($url == '/'){
    $url = ';'
   }

if (array_key_exists($url, $map)){
    include $map[$url];
}