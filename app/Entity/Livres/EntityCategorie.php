<?php

namespace App\Entity\Livres;
use \App\Entity\Entity;

class EntityCategorie extends Entity{

    public function getUrl(){
        return "index.php?p=categorie.show&id=$this->id";
    }

    public function getUrlAdmin(){
        return 'admin.php?p=admin.showlivre&id='.$this->id;
    }



}
