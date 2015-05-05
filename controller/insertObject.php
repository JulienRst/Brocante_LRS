<?php
	require_once("checkUser.php");
	require_once("getRoot.php");
	require_once(ROOT."\\model\\modelObject.php");

	$nom_obj = $_POST["nom_obj"];
	$url_img = "";
	$id_user = $_SESSION["user"]["id_user"];
	$id_categorie = $_POST["categorie"];
	$nbr_obj = $_POST["nbr_obj"];
	$description_obj = $_POST["description_obj"];
	$prix = $_POST["prix"];
	$date_enchere = $_POST["annee"].'-'.$_POST["mois"].'-'.$_POST["jour"].' '.$_POST["heure"].':'.$_POST["minute"].':0';

	$objecttosell = new gestionObject(0,$nom_obj,$id_categorie,$url_img,$id_user,0,$nbr_obj,$description_obj,$prix,$date_enchere,time(),"0000-00-00 00:00:00",0);

	$objecttosell->vendreObjet();
	//On dit au controller d'affichage de la page "Vente" que la mise en vente du produit s'est déroulé avec succès
	$_SESSION["selling_success"] = true;
	header('location:viewVente.php');
	exit(0);

?>