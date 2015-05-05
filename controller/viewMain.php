<?php
	/*On verifie la connexion de l'utilisateur et on implemente le root pour les liens*/
	require_once("checkUser.php");
	require_once("getRoot.php");
	require_once(ROOT."\\model\\modelProfil.php");
	
	// Variables
   
    
    //On verifie si les champs ont été complété
	$tab_resultat = array();

    if(!empty($_POST)){
    	//traitement
    	 $nom_obj = $_POST['nom_obj'];
   				$nom_vendeur = $_POST['nom_vendeur'];
    			$categorie = $_POST['categorie'];
    	if(!empty($nom_obj) && !empty($nom_vendeur) && !empty($categorie)){
    			$gestionProfil = new gestionProfil();

    		   

    			$tab_resultat = $gestionProfil->searchObject($nom_obj,$nom_vendeur,$categorie);

    	}
    }


	/*On affiche la page*/
	require_once ROOT."\\view\main.php";

?>