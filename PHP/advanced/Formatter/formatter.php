<?php 
namespace Formatter;
require_once 'Loader/loader.php';
use function Loader\loader;


function formatter(){
    
    $array = json_decode($fileContent, true);
    return $array;
  
};
  