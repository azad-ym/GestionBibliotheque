<?php

namespace App\Entity\Livres;
use \App\Entity\Entity;

class EntityLivre extends Entity{

    public function getUrl(){
        return "index.php?p=livre.show&id=$this->id";
    }

    public function getUrlAdmin(){
        return 'admin.php?p=admin.showlivre&id='.$this->id;
    }


    public function getContaint(){
        return substr($this->description, 0, 20). '...';
         
    }

    public function getTitle(){
        if(strlen($this->titre_livre) < 12){
            return $this->titre_livre;
        }
        return $this->titre_livre; 
        
    }





}