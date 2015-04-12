<?php
	require_once('getRoot.php');
	require_once(ROOT."model\\user.php");

	$gestionUser = new gestionUser();

	//Récupération des informations

	$login = $_POST['login'];
	$mdp = $_POST['mdp'];
	//$resultatConnection = un booléen  + (id user | error)
	$resultatConnection = $gestionUser->checkConnection($login,$mdp);

	if ($resultatConnection["connected"]){
		//récupérer l'utilisateur à l'aide de son id
		$user = $gestionUser->getUserById($resultatConnection['id']);
		session_start();
		print_r($user);
		$_SESSION["isConnected"] = true;
		$_SESSION["user"] = $user;

		header("location:viewMain.php");
	} else {
		header("location:viewConnection.php");
	}
			

?>