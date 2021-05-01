<?php 
namespace App\Table;

class Table{

    protected $table = null;
    protected $tableContraireUser;
    protected $tableContraireLivre;

    protected $db;

    public function __construct(\App\Database\Database $db){
        $this->db = $db;

        if($this->table === null){
            
            $table = explode('\\', get_class($this));
            $table = str_replace('Table', '', end($table));
            $table = lcfirst($table).'s';

            $this->table = $table;
        }
        if($this->table == 'users'){
            $this->tableContraireUser = 'types';
        }else{
            $this->tableContraireUser = 'users';
        }

        if($this->table == 'livres'){
            $this->tableContraireLivre = 'categories';
        }else{
            $this->tableContraireLivre = 'livres';
        }
    }

    public function extract($key, $value){
        $return = [];

        foreach($this->all() as $v){
            $return[$v->$key] = $v->$value;
        }

        return $return;
    }

    public function all(){
        return $this->requeteSql('SELECT * FROM '.$this->table);
    }

    public function delete($id){
        return $this->requeteSql("DELETE FROM $this->table WHERE id = $id");
    }

    public function lastLivres(){

        return $this->requeteSql("SELECT livres.id, titre_livre, auteur_livre, livres.description, categories.nom  FROM livres
        INNER JOIN categories
            ON categories.id = livres.id_categorie");
    }

    public function update($id, $options= []){

        $sql_parts = [];
        $attributs = [];

        foreach($options as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributs[] = $v;
        }

        $attributs[] = $id;
        $sql_part = implode(', ', $sql_parts);

        
        return $this->requeteSql("UPDATE $this->table SET $sql_part WHERE id = ?", $attributs, true);
    }

    public function insert($options= []){

        $sql_parts = [];
        $attributs = [];
        
        foreach($options as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributs[] = $v;
        }


        $sql_part = implode(', ', $sql_parts);
        
        
        return $this->requeteSql("INSERT $this->table SET $sql_part", $attributs, true);
    }

    public function search($q){
        
    }

    
    public function findLivre($id, $one = false){

        return $this->requeteSql(
            "SELECT livres.id, titre_livre, id_categorie, auteur_livre, livres.description, categories.id, categories.nom as nom  FROM $this->table
             INNER JOIN $this->tableContraireLivre
                ON categories.id = livres.id_categorie
                WHERE $this->table.id= ?",
            [$id], $one);
    }
    
    public function findUser($id, $one = false){
        return $this->requeteSql("SELECT users.id, nom_user, prenom, date_naissance, lieu_naissance, date_inscription, date_expiration, id_type, types.nom FROM $this->table
             INNER JOIN $this->tableContraireUser
                ON id_type = types.id
                WHERE id_type = ?", [$id], $one);
    }

    public function notFound(){
        header('HTTP/1.0 404 not found');
        header('location: index.php?p=404');
    }



    protected function requeteSql($requete, $attributs = null, $one = false){

        if($attributs === null){
            
            return $this->db->query(
                $requete,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }else{

            return $this->db->prepare(
                $requete,
                $attributs,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } 
    }
   

    



    
}