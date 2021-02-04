<?php
$user = App::getInstance()->getClass('user')->allUsers($_GET['id'], true);
?>

<div class="table">

    <table>
        <tr class='t_head'>
            <td>ID</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Date Naissance</td>
            <td>Lieu naissance</td>
            <td>Date inscription</td>
            <td>Date expiration</td>
            <td>Fonction</td>

        </tr>
        <tr class='t_body'>
            <td><?=$user->id?></td>
            <td><?=$user->nom_user?></td>
            <td><?=$user->prenom?></td>
            <td><?=$user->date_naissance?></td>
            <td><?=$user->lieu_naissance?></td>
            <td><?=$user->date_inscription?></td>
            <td><?=$user->date_expiration?></td>
            <td><?=$user->nom?></td>


        </tr>
    </table>
</div>