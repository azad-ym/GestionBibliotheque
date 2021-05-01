<?php
$form = new App\HTML\Forme($_POST);
$error = null;
$style = 'login';

if(!empty($_POST)){
    $auth = new App\Auth\DbAuth(App::getInstance()->getDB());

    $pass = md5($_POST['pass']);
    $rep = $auth->login($_POST['name'], $pass);

    if($rep){
        header('Location: admin.php');
    }else
        $error = 'Mot de passe ou identifiant incorrecte';  
}
?>


<?php if(isset($error)): ?>
    <div class="error"><?= $error; ?></div>
<?php endif ?>
<form method="post" class="form">
    
    <div class="login">
        <h2>Se connecter</h2>
        <?= $form->input('name', 'Nom') ?>
        <?= $form->input('pass', 'Mot de passe', ['type' => 'password']) ?>
        <input type="submit" value="Se connecter">
    </div>

</form>