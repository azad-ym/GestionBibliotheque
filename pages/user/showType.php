<?php
$app = App::getInstance()->getClass('user');
$users = $app->findUser($_GET['id']);
$types = App::getInstance()->getClass('type')->all();
$titreType = App::getInstance()->getClass('type')->findUser($_GET['id'], true);
if(empty($titreType)){
    $app->notFound();
}

?>

<h1 class='titre'><?=$titreType->nom ?></h1>

<div class="colone">
    <div class="line1">
        <div class="card_user">
            <?php foreach($users as $user) :  ?>
            <div class="content_user">
                <p><a href="<?=$user->getUrl()?>"><?=$user->getNomPrenom()?></a></p>
                <em><?=$user->nom?></em>
            </div>
            <?php endforeach ?>
        </div>
        
    </div>

    <div class="line2">
            <div class="categorie">
                <h2>Fonctions</h2>
                <?php foreach($types as $type): ?>
                <p><a href="<?= $type->getUrl()?>"><?= $type->nom?></a></p>
                <?php endforeach ?>
            </div>
    </div>
</div>