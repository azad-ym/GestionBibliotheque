<?php 
    $app = App::getInstance();
    $db_auth = new App\Auth\DbAuth($app->getDb());
  
    $logged = false;
    if($db_auth->logged()){
        $logged = true;
    }
?>

<style>
    /*--------------------------- navbar -----------------------------*/
    .navbar{
    margin: 20px 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 2px;
    padding: 5px 18px;
    width: 85%;
    }
    .navbar li{
        display: inline-block;
        margin-right: 20px;
        transition: transform .5s;
    }

    .navbar li:hover{
        transform: scale(1.04);
    }

    nav a{
        text-decoration: none;
        color: #000;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 15px;
        transition: .5s;
    }

    nav a:hover{
        color: #551A8B;
    }
    .left button{
        padding: 8px 18px;
        outline: none;
        border-radius: 20px;
        background: transparent;
        border: 2px solid #fff;
        cursor: pointer;
        transition: .5s;
    }
    .left button:hover{
        background: rgba(79, 108, 233, 0.15);
        transform: scale(1.02);

    }


    .navbar a{
        color: #fff;
        font-size: 17px;
    }

    .navbar img{
        width: 30px;
        height: 30px;
    }
    .top_bar{
        border-bottom: 2px solid #fff;
    }

</style>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon super site</title>
    <link rel="stylesheet" href="../public/css/<?=$style?>.css">
</head>
<body>
    <div class="navbar">
        <nav>
            <ul>
                <?php if(!$logged): ?>
                <li><?=$app->menu('Accueil', 'home') ?></li>
                <li><?=$app->menu('Adhérents', 'user') ?></li>
                <li><?=$app->menu('Livres', 'livre') ?></li>
                <?php endif ?>
                
                <?php if($logged): ?>
                <li><?=$app->menu('Accueil', 'home') ?></li>
                <?php endif ?>
            </ul>
        </nav> 
        
        <div class="left">
            <?php if(!$logged){
                echo '<button>'. $app->menu('Connexion', 'login').'</button>';
            }else{
                echo '<li>'.$app->menu('Administration', 'admin.index', true).'</li>';
                echo '<button>'.$app->menu('Deconnexion', 'deconexion', true).'</button>';
                

            }
            ?>
        </div>
    </div>
    
    <br>
    <div class="container">
        <?= $contenu ?>
    </div>
    
</body>
</html>
