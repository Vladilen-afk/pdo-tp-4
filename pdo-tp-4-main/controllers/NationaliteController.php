<?php
$action=$_Get['action'];
switch($action){
    case 'list':
        //traitement du formulaire la recherche
        $libelle="";
        $continentSel="Tous";
        if(!empty($_POST['libelle'])||!empty($_POST['continent'])){
            $libelle=$_POST['libelle'];
            $continentSel=$_POST['continent'];
        }
        $lesContinents=Continent::findAll();
        $lesNationalite=Nationalite::findAll($libelle,$continentSel);
        include('vues/nationalite/listesNationalites.php');
        break;
    case 'add':
        $mode='Ajouter';
        $lesContinents=Continent::findAll();
        include('vues/nationalite/formNationalite.php')
        break;
    case 'upade':
        $mode='Modifier';
        $lesContinents=Continent::findAll();
        $laNationalite=Nationalite::findById($_GET['num']);
        include('vues/nationalite/formNationalite.php');
        break;
    case 'delete':
        $laNationalite=Nationalite::findById($_GET['num']);
        $nb=nationalite::delete($laNationalite);
        if($nb==1){
            $_SESSION['message']=["success"=>"La Nationalite a bien été supprimé"];
        }else{
            $_SESSION['message']=["danger"=>"La Nationalite n'a pas été supprimé"];
        }
        header('location:index.php?uc=nationalite&action=list');
        break;
    case 'validerForm':
    $nationalite=new Nationalite();
    $continent=Continent::findById($_POST['continent']);
    if(empty($_POST['num'])){
        $nationalite->setLibelle($_POST['libelle']);
        $nationalite->setContinent($continent);
        $nb=Nationalite::add($nationalite);
        $message="ajouter";
    }else{
        $nationalite->setNum($_POST['num']);
        $nationalite->setLibelle($_POST['libelle']);
        $nationalite->setContinent($continent);
        $nb=Nationalite::update($nationalite);
        $message="modifier";
    }

    if($nb==1){
        $_SESSION['message']=["success"=>"La Nationalite a bien été $message"];
    }else{
        $_SESSION['message']=["danger"=>"La Nationalite n'a pas été $message"];
    }
    header('location:index.php?uc=nationalite&action=list');
        break;
}