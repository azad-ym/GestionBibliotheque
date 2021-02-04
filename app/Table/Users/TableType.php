<?php

namespace App\Table\Users;
use App\Table\Table;

class TableType extends Table{

    public function findType($id, $one = false){
        return $this->requeteSql(
            "SELECT * FROM $this->table
                WHERE $this->table.id= ?",
            [$id], $one);
    }

    

    
}