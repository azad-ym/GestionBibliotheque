<?php
use App\HTML\Forme;
$app = App::getInstance()->getClass('livre');
$categorie = App::getInstance()->getClass('categorie');
$options = $categorie->extract('id', 'nom');
$form = new Forme($_POST);

if(!empty($_POST['titre_livre']) && !empty($_POST['resume'])){
    $res = $app->insert([
        'titre_livre' => htmlspecialchars($_POST['titre_livre']),
        'auteur_livre' => htmlspecialchars($_POST['auteur_livre']),
        'description' => htmlspecialchars($_POST['resume']),
        'id_categorie' =>htmlspecialchars($_POST['id_categorie'])
    ]); 

    if($res){
        header('Location: admin.php?p=livre.edit&id='.App::getInstance()->getDB()->lastInsert());
    }

    
}

?>

<form method="post" class="form">
    <div class="login">
        <?=$form->input('titre_livre', 'Titre du livre') ?>
        <?=$form->input('auteur_livre', 'Auteur du livre') ?>
        <?=$form->input('resume', 'Resumé du livre', ['type' => 'textarea']) ?>
        <?=$form->select('id_categorie', 'Genre', $options)?>
        <input type="submit" value="Enregistrer">
    </div>

    

</form>