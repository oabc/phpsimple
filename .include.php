<?php
#ini_set("display_errors", "On");
#error_reporting(E_ALL | E_STRICT);
header('Access-Control-Allow-Origin:*');
define('SYSROOT',__DIR__);
define('WWWROOT','');
function req($path)
{
    require_once SYSROOT.$path.'.php';
}
function autoload($class){
    require_once SYSROOT.'/lib/'.str_replace('\\','/',$class).'.php';
}
spl_autoload_register('autoload');
req('/lib/Fun');
//if(!isset($_SERVER['HTTP_REFERER']) || parse_url($_SERVER['HTTP_REFERER'])["host"]!=$_SERVER['HTTP_HOST'])
//{
//    header('Location:'.WWWROOT.'web/');
//}
req('/db/.config');
req('/db/.db');
global $app;
if(!$app['db'])
{
    global $db;
    $db=newdb(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
}
