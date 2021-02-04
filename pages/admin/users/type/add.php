<?php
use App\HTML\Forme;
$app = App::getInstance()->getClass('type');
$form = new Forme($_POST);

if(!empty($_POST['nom'])){
    $res = $app->insert([
        'nom' => htmlspecialchars($_POST['nom']),
       
    ]); 
    if($res){
        header('Location: admin.php?p=type.edit&id='.App::getInstance()->getDB()->lastInsert());
    }
}

?>

<form method="post" class='form'>

    <div class="login">
        <?=$form->input('nom', 'Fonction') ?>
        <input type="submit" value="Enregistrer">
    </div>
    

</form>