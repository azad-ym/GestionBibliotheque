<?php

namespace App\Database;
use \PDO;

class MysqlDatabase extends Database{

    private $db_name;
    private $db_host;
    private $db_user;
    private $db_pass;

    private $pdo;


    public function __construct($db_name, $db_host, $db_user, $db_pass){

        $this->db_name = $db_name;
        $this->db_host = $db_host;

        $this->db_user = $db_user;
        $this->db_pass = $db_pass;

    }

    public function getPDO(){

        if($this->pdo === null){
            $this->pdo = new PDO("mysql:dbname=$this->db_name;host=$this->db_host", "$this->db_user", "$this->db_pass", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        }
        return $this->pdo;

    }

    public function query($requete, $class_name=null, $once = false){
        $pdo = $this->getPDO();


        $req = $pdo->query($requete);

        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if(
            strpos($requete, 'INSERT') === 0 ||
            strpos($requete, 'DELETE') === 0 ||
            strpos($requete, 'UPDATE') === 0
        ){
            return $req;
        }

        if($once){
            return $req->fetch();
        }else{
            return $req->fetchAll();
        }
    }

    public function prepare($requete, $options=[], $class_name= null, $once = false){

        $pdo = $this->getPDO();

        $req = $pdo->prepare($requete);
        
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        $req->execute($options);

        if(
            strpos($requete, "INSERT") === 0 ||
            strpos($requete, "DELETE") === 0 ||
            strpos($requete, "UPDATE") === 0
        ){
            return $req;
        }

        if($once){
            return $req->fetch();
        }else{
            return $req->fetchAll();

        }
    }

    public function lastInsert(){
        return $this->getPDO()->lastInsertId();
    }

    



}