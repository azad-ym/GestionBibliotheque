<?php

namespace App;

class Config{
    private $parametres = [];
    private static $_instance;

    public function __construct(){
        $this->parametres = require dirname(__DIR__). '/config/config.php';
    }


    public static function getInstance(){

        if(is_null(self::$_instance)){
            self::$_instance = new Config();
        }
        return self::$_instance;

    }

    public function get($key){

        if(isset($this->parametres[$key])){
            return $this->parametres[$key];
            
        }else{
            return null;
        }
    }
}