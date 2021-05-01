<?php


$livres = App::getInstance()->getClass('livre');
$categories = App::getInstance()->getClass('categorie');



?>
<div class="titre">
    <h1>Tous les livres disponibles</h1>
</div>

<div class="colone">
    <div class="line1">
        <div class="card">
            <?php foreach($livres->livreDisponible() as $livre): ?>
            <div class="content">
                <h3><a href="<?= $livre->getUrl()?>"><?=$livre->id.' - '.$livre->getTitle()?></a></h3>
                <em><?=$livre->nom ?></em>
                <p><?=$livre->getContaint() ?></p>
                <div class="button">
                    <a href="admin.php?p=admin.emprunt"><button>emprunter</button></a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        
    </div>
    <div class="line2">
        <div class="categorie">
            <h2>Genres</h2>
            <?php foreach($categories->all() as $categorie): ?>
            <p><a href="<?= $categorie->getUrl()?>"><?= $categorie->nom?></a></p>
            <?php endforeach ?>
        </div>
    </div>
</div>


