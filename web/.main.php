<?php
require_once __DIR__.'/../.include.php';
class Main{
    public function __construct($check=''){
        $check=false;
        req('/web/.header');
    }
    public function __destruct(){
        req('/web/.footer');
    }
}