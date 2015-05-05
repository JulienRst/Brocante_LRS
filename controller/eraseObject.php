<?php
	/*On verifie la connexion de l'utilisateur et on implemente le root pour les liens*/
	require_once("checkUser.php");
	require_once("getRoot.php");
	
	require_once(ROOT."model\\modelProfil.php");

	$idObj = $_GET["idObj"];
	$idUser = $_SESSION["user"]["id_user"];

	$gestionProfil = new gestionProfil();

	$obj_to_erase = $gestionProfil->getObjectById($idObj);

	$obj_to_erase->eraseObject($idObj,$idUser);

	header('location:viewProfil.php');
?>