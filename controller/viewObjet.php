<?php 
    /*On verifie la connexion de l'utilisateur et on implemente le root pour les liens*/
    require_once("checkUser.php");
    require_once("getRoot.php");
    
    require_once(ROOT."model/modelProfil.php");/*vu que dans le model, on a importé l'objet pour l'associer au profil*/

    $modelProfil = new gestionProfil();

    $idObject = $_GET["idObj"];
    $idUser = $_SESSION["user"]["id_user"];
    $objetDisplay = $modelProfil->getObjectById($idObject);

    /*On affiche la page*/
    require_once ROOT."\\view\objet.php";
?>