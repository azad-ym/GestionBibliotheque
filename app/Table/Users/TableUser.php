<?php

namespace App\Table\Users;
use App\Table\Table;


class TableUser extends Table{

    public function getAdherent(){
        return $this->requeteSql("SELECT users.id, nom_user, prenom, date_naissance, lieu_naissance, date_inscription, date_expiration, id_type, types.nom FROM users
             INNER JOIN types
                ON users.id_type = types.id
                WHERE users.id_type != ?", [2]);
    }

    public function allUsers($id){
        return $this->requeteSql("SELECT users.id, nom_user, prenom, date_naissance, lieu_naissance, date_inscription, date_expiration, id_type, types.nom FROM users
             INNER JOIN types
                ON users.id_type = types.id
                WHERE users.id= ?", [$id], true);
    }



   



    
}