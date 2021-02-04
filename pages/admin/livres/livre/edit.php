<?php
use App\HTML\Forme;
$app = App::getInstance()->getClass('livre');
$categorie = App::getInstance()->getClass('categorie');
$options = $categorie->extract('id', 'nom');
$data = $app->findLivre($_GET['id'], true);
$form = new Forme($data);

if(!empty($_POST['titre_livre'])){
    var_dump($_POST);
    $res = $app->update($_GET['id'], [
        'titre_livre' => htmlspecialchars($_POST['titre_livre']),
        'auteur_livre' => htmlspecialchars($_POST['auteur_livre']),
        'description' => htmlspecialchars($_POST['description']),
        'id_categorie' =>htmlspecialchars($_POST['id_categorie'])
    ]); 
    if($res){
        
        header('Location: admin.php?p=admin.livre');
    }
}
?>

<form method="post" class="form">
    <div class="login">
        <?=$form->input('titre_livre', 'Titre du livre') ?>
        <?=$form->input('auteur_livre', 'Auteur du livre') ?>
        <?=$form->input('description', 'Resumé du livre', ['type' => 'textarea']) ?>
        <?=$form->select('id_categorie', 'Genre', $options)?>
        <input type="submit" value="Modifier">
    </div>

    

</form>