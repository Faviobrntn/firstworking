<?php

define('DS', DIRECTORY_SEPARATOR);

define('ROOT', dirname(__DIR__));

define('APPNAME', 'firstworking');

if((!empty($_SERVER['HTTP_HOST'])) 
AND  ( ($_SERVER['HTTP_HOST'] == 'localhost') 
OR  ($_SERVER['HTTP_HOST'] == 'localhost:81'))){
    define('HOST', '/'.APPNAME.'/');
}else{
    define('HOST', '/'.APPNAME.'/');
}
//define('HOST', ((!empty($_SERVER['HTTP_HOST'])) AND( ($_SERVER['HTTP_HOST'] == 'localhost') OR  ($_SERVER['HTTP_HOST'] == 'localhost:81')))? '/'.APPNAME.'/': '/');
