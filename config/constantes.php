<?php

define('DS', DIRECTORY_SEPARATOR);

define('ROOT', dirname(__DIR__));

define('APPNAME', 'mvc');

define('HOST', ((!empty($_SERVER['HTTP_HOST'])) AND ($_SERVER['HTTP_HOST'] == 'localhost'))? '/'.APPNAME.'/': '/');
