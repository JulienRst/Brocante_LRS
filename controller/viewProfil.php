<?php 
    /*On verifie la connexion de l'utilisateur et on implemente le root pour les liens*/
    require_once("checkUser.php");
    require_once("getRoot.php");
    
    require_once(ROOT."model/modelProfil.php");

    $idUser = $_SESSION["user"]["id_user"];

    $modelProfil = new gestionProfil();

    $tab_categorie = $modelProfil->getAllObjectFor($idUser);

    /*On affiche la page*/
    require_once ROOT."\\view\profil.php";
?>