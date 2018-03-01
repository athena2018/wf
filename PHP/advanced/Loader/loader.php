<?php 
namespace Loader;

function loader(){
    $path = 'https://api.apis.guru/v2/list.json';
    
    $resource = fopen($path, 'r');
    
    $fileContent = fread($resource, filesize($path));
    
    return $fileContent;

};
