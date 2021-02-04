<?php


$livres = App::getInstance()->getClass('livre');
$categories = App::getInstance()->getClass('categorie');



?>
<div class="titre">
    <h1>Liste de tous les livres</h1>
</div>

<div class="colone">
    <div class="line1">
        <div class="card">
            <?php foreach($livres->lastLivres() as $livre): ?>
            <div class="content">
                <h3><a href="<?= $livre->getUrl()?>"><?=$livre->id.' - '.$livre->getTitle()?></a></h3>
                <em><?=$livre->nom ?></em>
                <p><?=$livre->getContaint() ?></p>
                <a href="<?= $livre->getUrl() ?>"><button>Voir livre </button></a>

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


