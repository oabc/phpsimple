<?php
class User {
    function __construct(){
        if(strlen($_POST)>200){
            $a['msg'] = "请求数据过长";
            }
    }
    //pwd on cookies
    static function isLogin(){
        $user=cget('_c_i');
        if($user)
        {
            useRsa();
            return decrypt($user);
        }
        else
            return '';
    }
    static function saveUser($user){
        useRsa();
        cset('_c_i',encrypt($user),365);
    }
}