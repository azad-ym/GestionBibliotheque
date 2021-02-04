<?php

$app = App::getInstance()->getClass('livre');

$res = $app->delete($_POST['id']);
if($res){
    header('Location: admin.php?p=admin.livre');
}