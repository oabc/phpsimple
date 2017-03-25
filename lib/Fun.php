<?php
function get($k)
{
    if(isset($_GET[$k]))
        return $_GET[$k];
    else
        return '';
}
function post($k)
{
    if(isset($_POST[$k]))
        return $_POST[$k];
    else
        return '';
}
function cset($k,$v,$t=false)
{
    if($t)
        setcookie($k,$v,time()+$t*24*3600);
    else
        setcookie($k,$v);
}
function cget($k)
{
    if(isset($_COOKIE[$k]))
        return $_COOKIE[$k];
    else
        return '';
}