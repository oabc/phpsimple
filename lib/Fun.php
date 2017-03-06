<?php
function get($key)
{
    if(isset($_GET[$key]))
        return $_GET[$key];
    else
        return '';
}
function post($key)
{
    if(isset($_POST[$key]))
        return $_POST[$key];
    else
        return '';
}