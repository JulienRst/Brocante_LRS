<?php
	require_once("getRoot.php");
	require_once(ROOT."model\\modelProfil.php");

	$gestionProfil = new gestionProfil();

	$afficherProfil = $gestionProfil->getObjetby($categorie);
	if ($afficherProfil["connected"]){
		//récupérer l'utilisateur à l'aide de son id
		$user = $gestionUser->getUserById($resultatConnection['id']);
		session_start();
		$_SESSION["user"]["nom"] = $user;

		header("location:viewProfil.php");
	} else {
		header("location:viewMain.php");
	}
?>