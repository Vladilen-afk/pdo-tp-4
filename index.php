<?php session_start(); ?>
<?php include "vues/header.php";

$uc =empty($_GET['uc']) ? "Acceuil" : $_GET['uc'];

switch($uc){
    case 'Accueil' :
        include "vues/Accueil.php";
        break;
    case 'continent':
        break;
}

include "vues/footer.php";?>
