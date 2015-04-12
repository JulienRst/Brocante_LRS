<?php
	//Check si un utilisateur est connecté (via les informations en session)
	session_start();
	if(!isset($_SESSION["isConnected"])){
		header('location:viewConnection.php');
		exit();
	} else {
		if($_SESSION["isConnected"] != true){
			header('location:viewConnection.php');
			exit();
		}
	}

?>