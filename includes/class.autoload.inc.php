<?php   
spl_autoload_register(callback: 'myAutoLoader');

function myAutoLoader($className): void {
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if(strpos(haystack: $url, needle: 'includes') !==false){
        $path = '../classes/';

    }
    else{
        $path = 'classes/';
    }
    $extention = '.class.php' ;
    require_once $path. $className . $extention;

}