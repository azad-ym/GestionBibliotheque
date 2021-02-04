<?php

namespace App\Entity\Users;
use \App\Entity\Entity;


class EntityType extends Entity{

    public function getUrl(){
        return 'index.php?p=show.type&id='.$this->id;
    }

    public function getUrlAdmin(){
        return 'admin.php?p=admin.showuser&id='.$this->id;
    }


    


}