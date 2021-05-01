<?php

$app = App::getInstance()->getClass('user');

$res = $app->delete($_POST['id']);
if($res){
    header('Location: admin.php?p=admin.user');
}