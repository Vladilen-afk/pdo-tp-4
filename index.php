<?php session_start(); ?>
<?php include "vues/header.php";

$uc =empty($_GET['uc'])?"acceuil" : $_GET['uc'];

switch($uc){
    case 'accueil':
        include "vues/Accueil.php";
        break;
    case 'continent':
        break;
}

include "vues/footer.php";?>
