<?php
use App\HTML\Forme;
$app = App::getInstance()->getClass('type');
$data = $app->findType($_GET['id'], true);
$form = new Forme($data);

if(!empty($_POST['nom'])){
    $res = $app->update($_GET['id'], [
        'nom' => htmlspecialchars($_POST['nom']),
    ]); 
    if($res){
        
        header('Location: admin.php?p=admin.type');
    }
}

?>

<form method="post" class='form'>
    <div class="login">
        <?=$form->input('nom', 'Fonction') ?>
        <input type="submit" value="Modifier">
    </div>

</form>