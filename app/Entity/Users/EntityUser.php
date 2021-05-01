<?php

namespace App\Entity\Users;
use \App\Entity\Entity;


class EntityUser extends Entity{

    public function getUrl(){
        return 'index.php?p=show.user&id='.$this->id;
    }

    public function getNomPrenom(){
        return $this->id.' - '. $this->nom_user.' '.$this->prenom;
    }
    

    


}