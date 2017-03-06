<?php
/*
 * 下面别修改
 */
//medoo
//set timezone
req('/db/.Medoo');

function newdb($DB_HOST,$DB_USER,$DB_PWD,$DB_DBNAME)
{
 date_default_timezone_set('PRC');
//Using Mysqli
$dbc = new mysqli($DB_HOST,$DB_USER,$DB_PWD,$DB_DBNAME);
if(!$dbc->client_info)die('db error 8');
$db_char = DB_CHARSET;
$dbc->query("SET NAMES utf8");
$dbc->query("SET time_zone = '+8:00'");
$arr = array(
    // required
    'database_type' => DB_TYPE,
    'database_name' => $DB_DBNAME,
    'server' => $DB_HOST,
    'username' => $DB_USER,
    'password' => $DB_PWD,
    'charset' => DB_CHARSET,

    // optional
    'port' => 3306,
    // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
    'option' => array(
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    )
);
return new medoo($arr);
}