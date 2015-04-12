<?php
	require_once("getRoot.php"); 
	require_once(ROOT."\\model\\user.php");

	$gestionUser = new gestionUser();

	if(isset($_FILES['img']) && $_FILES['img']["error"] == 0){ 
	    $dossier = ROOT.'\\assets\\datas\\profil-pic\\';
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['img']['name'], '.');
		if(!in_array(strtolower($extension), $extensions)){
			$fichier = ''; //Pas la bonne extension (message d'erreur ? :) )
		} else {
			$fichier = uniqid().'.'.$extension;
			if(move_uploaded_file($_FILES['img']['tmp_name'], $dossier.$fichier)){
				echo 'Upload effectué avec succès !';
			} else {
				$fichier = '';
			}
		}
	} else {
		$fichier = '';
	}

	if ((!empty($_POST['login'])) && (!empty($_POST['mdp'])) && (!empty($_POST['telephone'])) && (!empty($_POST['sexe'])) && (!empty($_POST['mail'])) && (!empty($_POST['commentaire'])) && (!empty($_POST['age']))){
		$mail = $_POST['mail'];
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$telephone = $_POST['telephone'];
		$age = $_POST['age'];
		$sexe = $_POST['sexe'];
		$commentaire = $_POST['commentaire'];
		// Génération aléatoire d'une clé
		$clef = uniqid();

		$gestionUser->insertUserInBDD($login,$mdp,$mail,$age,$sexe,$telephone,$commentaire,$clef,$fichier);
		//envoie du mail de vérification
		header('location:viewConnection.php');
	} else {
		echo('ça couille ! :)');
	}
?>