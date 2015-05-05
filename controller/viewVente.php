<?php
	/*On verifie la connexion de l'utilisateur et on implemente le root pour les liens*/
	require_once("checkUser.php");
	require_once("getRoot.php");
	
	//ON VERIFIE SI CA FONCTIONNE : Voir le contenu du $_SESSION (et donc checker que la connexion fonctionne bien)
	/*session_start();
	print_r($_SESSION);*/

	/*On affiche la page*/
	require_once ROOT."\\view\\vente.php";
?>