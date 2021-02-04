<?php 

namespace App\Table\Emprunt;


class TableEmprunt extends \App\Table\Table{

    public function allEmprunt(){
        return $this->requeteSql("SELECT emprunts.id, retourne, date_emprunt, date_retour, nom_user, prenom, livres.id as id_livres,  titre_livre, disponibilite FROM emprunts
            INNER JOIN users
                ON emprunts.id_user = users.id
            INNER JOIN livres
                ON emprunts.id_livre = livres.id
                ORDER BY date_retour AND retourne");
    }

    public function livreExiste($titre, $one = true){

        $livre = $this->requeteSql("SELECT * FROM livres WHERE titre_livre = ?", [$titre], $one);
        if(!empty($livre)){
            return true;
        }
        return false;
    }

    public function getIdLivre($titre, $one = true){
        $livre = $this->requeteSql("SELECT * FROM livres WHERE titre_livre = ?", [$titre], $one);
        if(!empty($livre)){
            return $livre;
        }
    }

    public function userExiste($nom, $one = false){

        $user = $this->requeteSql("SELECT * FROM users WHERE nom_user = ?", [$nom], $one);
        if(!empty($user)){
            return true;
        }
        return null;
    }

    public function getIdUser($nom, $one = true){

        $user = $this->requeteSql("SELECT * FROM users WHERE nom_user = ?", [$nom], $one);
        if(!empty($user)){
            return $user->id;
        }
        return null;
    }

    public function findOperationByIdLivre($id_livre){
        return $this->requeteSql("SELECT id FROM $this->table WHERE id_livre = ? ", [$id_livre]);
    }

    


}