<?php

namespace App;

class Autoloader {


    public static function appelleAutoload(){

        spl_autoload_register([__CLASS__, 'autoloader']);
    }

    public static function autoloader($class){

        if(strpos($class, __NAMESPACE__) === 0){
            $class = str_replace(__NAMESPACE__.'\\', '', $class);
            $class = str_replace('\\', '/', $class);

            require __DIR__.'/'.$class.'.php';
        }
    }
}