<?php

namespace App\Table\Livres;
use App\Table\Table;


class TableCategorie extends Table{

    public function findTitre($id, $one = false){

        return $this->requeteSql(
            "SELECT livres.id, titre_livre, auteur_livre, livres.description, categories.nom as nom  FROM $this->table
             INNER JOIN $this->tableContraireLivre
                ON categories.id = livres.id_categorie
                WHERE $this->table.id= ?",
            [$id], $one);
    }

    public function findCategorie($id, $one = false){
        return $this->requeteSql(
            "SELECT * FROM $this->table
                WHERE $this->table.id= ?",
            [$id], $one);
    }

    public function findLivreByCategorie($id, $one = false){

        return $this->requeteSql(
            "SELECT livres.id as id_livre, titre_livre, id_categorie, auteur_livre, livres.description, categories.id, categories.nom as nom  FROM $this->table
             INNER JOIN $this->tableContraireLivre
                ON categories.id = livres.id_categorie
                WHERE $this->table.id= ?",
            [$id], $one);
    }
    
}

