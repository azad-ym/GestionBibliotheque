<?php

class App{

    private static $_instance;
    private $db_instance;


    public static function getInstance(){

        if(self::$_instance === null){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    //Appelle la methode static qui appelle l'autoloader
    public function load(){

        session_start();
        require ROOT.'/app/Autoloader.php';
        App\Autoloader::appelleAutoload();
    }

    // 
    public function getClass($class){
        if(strpos(strtolower($class), 'user') === 0 || strpos(strtolower($class), 'type') === 0){

            $table = 'App\\Table\\Users\\Table'.ucfirst($class);

        }elseif(strpos(strtolower($class), 'livre') === 0 || strpos(strtolower($class), 'categorie') === 0){

            $table = 'App\\Table\\Livres\\Table'.ucfirst($class);

        }elseif(strpos(strtolower($class), 'emprunt') === 0){

            $table = 'App\\Table\\Emprunt\\Table'.ucfirst($class);

        }else{

            $table = 'App\\Table\\Table'.ucfirst($class);

        }
        return new $table($this->getDB());
    }

    public function login(){
        $login = new App\Auth\DbAuth($this->getDB());
        return $login->login('azad', 'mina');
    }

    public function logout(){
        
        unset($_SESSION['auth']);
        header("location: index.php");
    }

    //Initialise notre base de donné en instanciant la classe MysqlDatabase
    public function getDB(){

        //recupere la configuration de la base de donnée sur la class Config
        $param = App\Config::getInstance();

        if($this->db_instance === null){
            $this->db_instance = new App\Database\MysqlDatabase($param->get('db_name'), $param->get('db_host'),$param->get('db_user'), $param->get('db_pass'));
        }
        return $this->db_instance;

    }

    public function menu($nom, $url, $admin=false){
        if($admin){
            return  '<a href="admin.php?p='.$url.'">'.$nom.'</a>';
        }
        return '<a href="index.php?p='.$url.'">'.$nom.'</a>';
    }

    public function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        header('Location: index.php?p=login');
    }
    

    
}