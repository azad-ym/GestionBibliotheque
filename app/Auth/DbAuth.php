<?php

namespace App\Auth;



class DbAuth {
    
    private $db;
    public function __construct(\App\Database\Database $db){

        $this->db = $db;
    }

    public function login($nom, $password){

        $user = $this->db->prepare("SELECT users.id as user_id, nom_user, prenom, adminastration.id, adminastration.password, adminastration.id_type, users.id_type, types.nom FROM users
            INNER JOIN types
            ON users.id_type = types.id
            INNER JOIN adminastration
            ON types.id = adminastration.id_type
            WHERE nom_user = ? ", [$nom],null, true
        );

        if($user){
            if($user->password === $password){
                $_SESSION['auth'] = $user->user_id;
                return true;
            }
        }
        return false;
    }

    public function logged(){
        return isset($_SESSION['auth']);
    }


    
}