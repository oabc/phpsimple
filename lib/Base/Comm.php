<?php

namespace Base;


class Comm {

    function __construct(){
if(strlen($_POST)>200){
    $a['msg'] = "请求数据过长";
}
    }
    //pwd on cookies
    static function GetPost($key){
        if(isset($_POST[$key]))
            return $_POST[$key];
        else
            return '';
    }
    static function PasswdMd5($pwd){
        return md5($pwd.'lsf');
    }
    static function CoPW($pw){
        global $salt;
        //$x =  base64_encode($pw.$salt);
        $x =  hash('sha256',$pw.$salt);
        $x = substr($x,5,45);
        return $x;
    }
    //pwd on db
    static function SsPW($pwd){
        global $salt;
        global $pwd_mode;
        switch ($pwd_mode){
            case 1 :
                return md5($pwd);
                break;
            case 2 :
                return hash('sha256',$pwd.$salt);
                break;
            default:
                return hash('sha256',$pwd.$salt);
        }
    }

    static function md5WithSaltPw($pwd){
        global $salt;
        return md5($pwd.$salt);
    }
    public static function getClientIP()
    {
        $ip = "unknown";
        /*
         * 访问时用localhost访问的，读出来的是“::1”是正常情况。
         * ：：1说明开启了ipv6支持,这是ipv6下的本地回环地址的表示。
         * 使用ip地址访问或者关闭ipv6支持都可以不显示这个。
         * */
        if (isset($_SERVER)) {
            if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                $ip = $_SERVER['REMOTE_ADDR'];
            } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } elseif (isset($_SERVER["HTTP_CLIENT_ip"])) {
                $ip = $_SERVER["HTTP_CLIENT_ip"];
            } elseif (isset($_SERVER["REMOTE_ADDR"])) {
                $ip = $_SERVER["REMOTE_ADDR"];
            } else {
                $ip = 'Unknown';
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $ip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_ip')) {
                $ip = getenv('HTTP_CLIENT_ip');
            } else {
                $ip = getenv('REMOTE_ADDR');
            }
        }
        if (trim($ip) == "::1") {
            $ip = "127.0.0.1";
        }
        return $ip;
    }
    //Gravatar
    static function Gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        //$url = 'http://gravatar.duoshuo.com/avatar/';
        $url = 'https://secure.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }



}