<?php

$livre = App::getInstance()->getClass('livre')->getLivreById($_GET['id']);

if(!isset($livre->id)){
    App::getInstance()->getClass('livre')->notFound();
}

?>

<div class="table">

    <table>
        <tr class='t_head'>
            <td>ID</td>
            <td>Titre</td>
            <td>Auteur</td>
            <td>Genre</td>
            <td>Description</td>
        </tr>
        <tr class='t_body'>
            <td><?=$livre->id?></td>
            <td><?=$livre->titre_livre?></td>
            <td><?=$livre->auteur_livre?></td>
            <td><?=$livre->nom?></td>

            <td><?=$livre->description?></td>

        </tr>
    </table>
</div>