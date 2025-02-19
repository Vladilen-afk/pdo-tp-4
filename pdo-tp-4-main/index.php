<?php ob_start();
session_start();
include ("vues/header.php");
include ("modeles/Continent.php");
include ("modeles/Nationalite.php");
include ("modeles/monPdo.php");
include("vues/messagesFlash.php");    

$uc =empty($_GET['uc']) ? "Acceuil" : $_GET['uc'];

switch($uc){
    case 'Accueil' :
        include "vues/Accueil.php";
        break;
    case 'continents':
        include "controller/continentsController.php";
        break;
    case 'nationalites':
        include "controller/nationalitesController.php";
        break;
}

include "vues/footer.php";?>
