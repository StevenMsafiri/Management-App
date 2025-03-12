<?php

define("WEBSITE_NAME", "My Website");

define("DB_TYPE", "mysql");
define('DB_NAME','staff_management');
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_HOST", "localhost");


define('PROTOCOL','http');


$path = str_replace("\\", "/",PROTOCOL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app/core", "public", $path));
define('ASSETS', str_replace("app/core", "public/assets", $path));

define('DEBUG',true);

if(DEBUG)
{
    ini_set("display_errors",1);
}else{
    ini_set("display_errors",0);
}