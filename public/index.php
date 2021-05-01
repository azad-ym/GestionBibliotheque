<?php 
define('ROOT', dirname(__DIR__));

require_once ROOT.'/app/App.php';

$app = App::getInstance();
$app->load();


if(isset($_GET['p'])){

    $p = $_GET['p'];
}else{
    $p = 'home';
}

if($p === 'login'){
    $style = 'login';
}else {
    $style = 'style';
}


ob_start();

if($p === 'home'){
    require ROOT.'/pages/home.php';
}elseif($p === 'user'){
    require ROOT.'/pages/user.php';
}elseif($p === 'livre'){
    require ROOT.'/pages/livre/index.php';
}elseif($p === 'show.user'){
    require ROOT.'/pages/user/showUser.php';
}elseif($p === 'show.type'){
    require ROOT.'/pages/user/showType.php';
}elseif($p === 'livre.show'){
    require ROOT.'/pages/livre/livres.php';
}elseif($p === 'categorie.show'){
    require ROOT.'/pages/livre/categories.php';
}elseif($p === 'login'){
    require ROOT.'/pages/login/login.php';
}else{
    
}

$contenu = ob_get_clean();
require ROOT.'/pages/template/default.php';

