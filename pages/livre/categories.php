<?php


$livres = App::getInstance()->getClass('livre');
$categories = App::getInstance()->getClass('categorie');
$titre_categorie = App::getInstance()->getClass('categorie')->findTitre($_GET['id'], true);

if($titre_categorie === false){
    $livres->notFound();
}

?>
<div class="titre">
    <h1><?=$titre_categorie->nom ?></h1>
</div>


<div class="colone">
    <div class="line1">
        <div class="card">
            <?php foreach($livres->findLivreBycateg($_GET['id']) as $livre): ?>
            <div class="content">
                <h3><a href="<?= $livre->getUrl()?>"><?=$livre->id.' - '. $livre->titre_livre?></a></h3>
                <em><?=$livre->nom ?></em>
                <p><?=$livre->getContaint() ?></p>
                <a href="admin.php?p=admin.emprunt"><button>emprunter</button></a>

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




