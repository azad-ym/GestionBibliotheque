<?php
$form = new App\HTML\Forme($_POST);
$date = new \DateTime();
$date_now = new \DateTime();


if(isset($_POST['dure']) === "2"){
    $date_retour = $date->modify('+14 day');
}elseif (isset($_POST['dure']) === "2") {
    $date_retour = $date->modify('+21 day');
}else{
    $date_retour = $date->modify('+7 day');
}

$error = null;
$style = 'login';

if(!empty($_POST)){
    $app = App::getInstance()->getClass('emprunt');
    if ($app->livreExiste($_POST['titre'])) {

        $livre = $app->getIdLivre($_POST['titre']);

        if ($app->userExiste($_POST['name'])) {
            if($livre->disponibilite == null){
                App::getInstance()->getClass('livre')->update($livre->id, [
                    "disponibilite" => true
                ]);
                $res = $app->insert([
                    'id_livre' => $livre->id,
                    'id_user' => $app->getIdUser($_POST['name']),
                    'date_emprunt' => $date_now->format('Y/m/d'),
                    'date_retour' => $date_retour->format('Y/m/d')
                ]); 
            
                if($res){
                    header('Location: admin.php?p=admin.index');
                }
            }else{
                $error = 'Ce livre n\'est pas disponible pour le moment !';
            }

        }else {
            $error = 'Personne n\'est enregistrer de ce nom!';
        }
    }else {
        $error = 'Ce livre n\'existe pas';
    }
   
}
    
?>
<form method="post">

    <label for="retour"></label>
    


</form>

<?php if(isset($error)): ?>
    <div class="error"><?= $error; ?></div>
<?php endif ?>
<form method="post" class="form">
    <div class="login">
        <h2>Effectuer une operation</h2>
        <?= $form->input('name', 'Nom') ?>
        <?= $form->input('titre', 'Titre du livre') ?>
        <input type="submit" value="Effectuer">
    </div>

    <div class="dure">
        <h2>Durée d'emprunt</h2>

        <div class="radio">
            <?=$form->radio('dure', '1', "Une semaine") ?>
        </div>

        <div class="radio">
            <?=$form->radio('dure', '2', "Deux semaines") ?>

        </div>

        <div class="radio">
            <?=$form->radio('dure', '3', "Trois semaines") ?>
        </div>

        
    </div>

</form>