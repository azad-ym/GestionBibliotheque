
<?php
$types = App::getInstance()->getClass('type');
$categories = App::getInstance()->getClass('categorie');


?>
<style>
    .mina{
        display: flex;

    }
    .col1{
        padding: 14px 20px;
        border-radius: 12px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        margin-right: 20px;
        margin-bottom: 10px;
        width: 35%;
    }

    .col1 a{
        color: #fff;
        font-weight: bold;
    }
    
    .col2 button{
        padding: 12px;
        border: none;
        border-radius: 12px;
        background-color: #3d7fe2;
        margin-right: 10px;
        cursor: pointer;
        outline: none;
        color: #fff;
        transition: transform .5s;
    }
    button:hover{
        transform: scale(1.04);
    }

    .col3 button{
        padding: 12px;
        border: none;
        border-radius: 12px;
        background-color: rgb(192, 12, 16);
        margin-right: 20px;
        color: #fff;
        outline: none;
        cursor: pointer;
        transition: transform .5s;


    }
    .ajout a{
        padding: 12px;
        border: none;
        border-radius: 12px;
        background-color: #09a12f;
        margin-right: 20px;
        color: #fff;
        cursor: pointer;
        transition: transform .5s;


    }
    .ajout{
        padding: 0px 2px 30px 10px;
    }
    .ajout a:hover{
        transform: scale(1.04);
    }

    
</style>

<div class="titre">
    <h1>Administrer les Fonctions</h1>
</div>
<div class="ajout">
    <a href="admin.php?p=type.add">ajouter</a>
</div>

<?php foreach($types->all() as $type): ?>
    <div class="mina">
        <div class="user col1">
            <a href="<?= $type->getUrlAdmin()?>"><?=$type->id.' - '. $type->nom?></a><br>
        </div>
        <div class="col2">
            <a href="admin.php?p=type.edit&id=<?=$type->id?>"><button>editer</button></a>
        </div>
    </div>
    
<?php endforeach ?>
    
    