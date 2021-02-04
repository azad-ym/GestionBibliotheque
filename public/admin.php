<?php 

define('ROOT', dirname(__DIR__));

require_once ROOT.'/app/App.php';

$app = App::getInstance();
$app->load();

$auth = new App\Auth\DbAuth($app->getDB());
if(!$auth->logged()){
    $app->forbidden();
}

if(isset($_GET['p'])){

    $p = $_GET['p'];
}else{
    $p = 'admin.index';
}

$css = explode('.', $p);

if($css[1] == "edit" || $css[1] == "add"){
    $style = 'login';
}else{
    $style = 'style';
}

ob_start();

if($p === 'admin.index'){
    require ROOT.'/pages/admin/index.php';
}elseif($p === 'livre.add'){
    require ROOT.'/pages/admin/livres/livre/add.php';
}elseif($p === 'livre.edit'){
    require ROOT.'/pages/admin/livres/livre/edit.php';
}elseif($p === 'livre.delete'){
    require ROOT.'/pages/admin/livres/livre/delete.php';
}elseif($p === 'admin.livre'){
    require ROOT.'/pages/admin/livres/livre/livre.php';
    
}elseif($p === 'categorie.edit'){
    require ROOT.'/pages/admin/livres/categorie/edit.php';
}elseif($p === 'categorie.add'){
    require ROOT.'/pages/admin/livres/categorie/add.php';
}elseif($p === 'categorie.delete'){
    require ROOT.'/pages/admin/livres/categorie/delete.php';
}elseif($p === 'admin.categorie'){
    require ROOT.'/pages/admin/livres/categorie/categ.php';
}elseif($p === 'admin.showlivre'){
    require ROOT.'/pages/admin/show/showLivre.php';

}elseif($p === 'user.add'){
    require ROOT.'/pages/admin/users/user/add.php';
}elseif($p === 'user.edit'){
    require ROOT.'/pages/admin/users/user/edit.php';
}elseif($p === 'user.delete'){
    require ROOT.'/pages/admin/users/user/delete.php';
}elseif($p === 'admin.user'){
    require ROOT.'/pages/admin/users/user/user.php';

}elseif($p === 'type.edit'){
    require ROOT.'/pages/admin/users/type/edit.php';
}elseif($p === 'type.add'){
    require ROOT.'/pages/admin/users/type/add.php';
}elseif($p === 'type.delete'){
    require ROOT.'/pages/admin/users/type/delete.php';

}elseif($p === 'deconexion'){
    require ROOT.'/pages/login/deconexion.php';
}elseif($p === 'admin.type'){
    require ROOT.'/pages/admin/users/type/type.php';
}elseif($p === 'admin.showuser'){
    require ROOT.'/pages/admin/show/showUser.php';
}elseif($p === 'admin.emprunt'){
    require ROOT.'/pages/admin/emprunt/emprunt.php';
}


$contenu = ob_get_clean();
require ROOT.'/pages/template/default.php';

