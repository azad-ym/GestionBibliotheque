<?php
use App\HTML\Forme;
$app = App::getInstance()->getClass('user');
$date = new \DateTime();
$data = $app->allUsers($_GET['id']);
$type = App::getInstance()->getClass('type');
$options = $type->extract('id', 'nom');

$form = new Forme($data);

if(!empty($_POST['nom_user'])){
    $res = $app->update($_GET['id'], [
        'nom_user' => htmlspecialchars($_POST['nom_user']),
        'prenom' => htmlspecialchars($_POST['prenom']),
        'date_naissance' => htmlspecialchars($_POST['date_naissance']),
        'lieu_naissance' =>htmlspecialchars($_POST['lieu_naissance']),
        'date_inscription' => $date->format('Y/m/d'),
        'date_expiration' => $date->format('Y/m/d'),
        'id_type' =>htmlspecialchars($_POST['id_type']),

    ]); 
    if($res){
        header('Location: admin.php?p=admin.user');
    }
}

?>

<form method="post" class="form">

    <div class="login">
        <?=$form->input('nom_user', 'Nom') ?>
        <?=$form->input('prenom', 'Prénom') ?>
        <?=$form->input('date_naissance', 'Date de naissance', ['type' => 'date']) ?>
        <?=$form->input('lieu_naissance', 'Lieu de naissance') ?>

        <?=$form->select('id_type', 'Fonction', $options)?>
        <input type="submit" value="Enregistrer">
    </div>

    

</form>