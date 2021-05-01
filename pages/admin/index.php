<?php
$operations = App::getInstance()->getClass('emprunt');
if(isset($_POST['retour'])){
    foreach($_POST['retour'] as $id_livre){
        
        foreach($operations->findOperationByIdLivre($id_livre) as $id){
            App::getInstance()->getClass('livre')->update($id_livre, [
                "disponibilite" => null 
            ]);
            $operations->update($id->id, [
                'retourne' => 1
            ]);
    
        }
    }

}
?>


<div class="admin"> 
    <div class="azad">
        <div class="left">
        
            <?=$app->menu('Effectuer un emprunt', 'admin.emprunt',true) ?>
            <?=$app->menu('Administrer les livres', 'admin.livre', true) ?>
            <?=$app->menu('Les categories', 'admin.categorie',true) ?>
            <?=$app->menu('Administrer les membres', 'admin.user', true) ?>
            <?=$app->menu('Les Fonctions', 'admin.type',true) ?>
      
        </div>
    </div>
    
    <div class="table">
        <div class="table_body">
            <h2 class="titre">Tous les livres empruntés</h2>
            <table>
                <form method="post">
                    <tr class='t_head'>
                        <td>ID</td>
                        <td>Nom et Prenom</td>
                        <td>Titre du livre</td>
                        <td>Date d'emrunt</td>
                        <td>Date de retour</td>
                        <td><button class="btn" type="submit">Retourner</button></td>
                    </tr>

                    <?php foreach($operations->allEmprunt() as $k => $operation): ?>
                    <?php
                    if($operation->retourne !== null){
                        $checked = "checked";
                        $disabel = "disabled";

                    }else{
                        $checked = "";
                        $disabel = "";
                    }
                    
                    ?>
                    <tr class='t_body'>
                        <td><?=$operation->id?></td>
                        <td><?=$operation->nom_user . ' '. $operation->prenom?></td>
                        <td><?=$operation->titre_livre?></td>
                        <td><?=$operation->date_emprunt?></td>
                        <td><?=$operation->date_retour?></td>
                        <td>
                            
                            <div class="bttn_chek">
                                <input type="checkbox" value="<?=$operation->id_livres?>" <?=$disabel?> <?=$checked?> name="retour[]" id="<?=$operation->id ?>"><label for="<?=$operation->id?>"></label>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </form>
               
            </table>
        </div>
        
    </div>

</div>
