
<?php
$app = App::getInstance()->getClass('user');
$type = App::getInstance()->getClass('type')->findUser($_GET['id'], true);
if(!isset($type->id)){
    $app->notFound();
}

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
        margin-bottom: 12px;
        width: 35%;
    }

    .col1 a{
        color: #fff;
    }
    .col2 button{
        padding: 12px;
        border: none;
        border-radius: 12px;
        background-color: #3d7fe2;
        margin-right: 10px;
        position: relative;
        top: 14px;
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
        position: relative;
        top: 14px;
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
    <h1>Administrer le(s) <?=$type->nom?>(s) </h1>
</div><br><br><br>

<div class="ajout">
    <a href="admin.php?p=user.add">ajouter</a>
</div>

<?php foreach($app->findUser($_GET['id']) as $user): ?>
    <div class="mina">
        <div class="user col1">
            <a href="<?= $user->getUrl()?>"><?=$user->id.' - '. $user->nom_user?></a><br>
            <em><?=$user->nom ?></em>
        </div>
        <div class="col2">
            <a href="admin.php?p=user.edit&id=<?=$user->id?>"><button>editer</button></a>
        </div>
        
        <div class="col3">
            <form action="?p=user.delete" method="post">
                <input  type="hidden" name="id" value="<?=$user->id ?>">
                <button  href="?p=user.delete&id=<?=$user->id ?>">supprimer</button>

            </form>
        </div>
    </div>
    
<?php endforeach ?>
    
    