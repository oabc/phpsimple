<?php
namespace Base;

class Res {

    public $j;
    public function __construct(){
        $this->j['msg']='invalid';
    }
    public function get($key)
    {
        return $this->j[$key];
    }
    public function set($key,$value='')
    {
        $this->j[$key]=$value;
    }
    public function out($value='invalid')
    {
        $this->j['msg']=$value;
        die();
    }
    public function o($value='invalid')
    {
        $this->j['msg']=$value;
        die();
    }
    public function __get($key)
    {
        return $this->j->$key;
    }    
    public function __set($key,$value='')
    {
        $this->j[$key]=$value;
    }    
    public function __destruct(){
        echo json_encode($this->j);
    }
}