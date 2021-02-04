<?php

namespace App\Table\Livres;
use \App\Table\Table;


class TableLivre extends Table{

    public function getLivreById($id){
        
        return $this->requeteSql(
            "SELECT livres.id, titre_livre, auteur_livre, livres.description, categories.nom  FROM livres
             INNER JOIN categories
                ON categories.id = livres.id_categorie
                WHERE livres.id= ?",
            [$id], true);
    }

    public function findLivreBycateg($id, $one = false){

        return $this->requeteSql(
            "SELECT livres.id, titre_livre, auteur_livre, livres.description, categories.nom as nom  FROM $this->table
             INNER JOIN $this->tableContraireLivre
                ON categories.id = livres.id_categorie
                WHERE categories.id= ?",
            [$id], $one);
    }

    public function livreDisponible(){

        return $this->requeteSql("SELECT livres.id, titre_livre, auteur_livre, livres.description, categories.nom  FROM livres
        INNER JOIN categories
            ON categories.id = livres.id_categorie
            WHERE livres.disponibilite IS NULL");
    }

    



    
}