<?php 
//require_once 'FileDumper/fileDumper.php';
//require_once 'Formatter/formatter.php';
//require_once 'Store/store.php';
//require_once 'Loader/loader.php';


// 3 files created : loader, formatter, fileDumper, store
//load string from json in the loader



//convert it to an array with the provided func in the formatter


//In the csv file

//use function Formatter\formatter;
//using fread to get the file content array
    
//the title of the prefered version info, 
//the prefered version description, 
//the prefered version name, 
//the created entry and the prefered version update date in french format (d-m-Y H:i:s)

function loader(){
    $path = 'https://api.apis.guru/v2/list.json';
    
    $resource = fopen($path, 'r');
    
    $fileContent = fread($resource, filesize($path));
    
    return $fileContent;
    
};

function formatter(){
    
    $array = json_decode($fileContent, true);
    return $array;
    
    foreach ($array as $title){
        echo $title;
    }
    
};





