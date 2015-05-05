<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" lang="fr" content="eshop,brocante, vente, ecommerce," />
	    <meta name="description" content="Votre brocante en ligne" />
	    
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"/>
	</head>
	<body>
		<?php require_once(ROOT."\\view\\nav.php");?> 
		
		<!-- /*on gere l'affichage des pages ici*/ -->
		<!-- /* **** VENTE **** */ -->
		<h1>Mettre en vente un objet</h1>
		<form action="insertObject.php" enctype="multipart/form-data" method="post">
		    
		    Nom de l'objet : 
		    <input type="text" name="nom_obj" />
		    <br/>
		    
		    Photo de l'objet :  
		    <input type="file" name="img"/>  
		    <br/>
		    <?php if(isset($e)){echo $e;}?>
		    <br/>
		    
		    Catégorie de l'objet : 
		    <select name="categorie">
		        <option value="choix" selected>Choisissez une catégorie</option>
		        <option value="1">Vêtements et Chaussures</option>
		        <option value="2">Livres</option>
		        <option value="3">Musique, Films</option>
		        <option value="4">High-Tech et Informatique</option>
		        <option value="5">Jeux Vidéo</option>
		        <option value="6">Jouets</option>
		        <option value="7">Maison, Bricolage</option>
		        <option value="8">Montre, Bijoux et Accessoires</option>
		        <option value="9">Sport et Loisirs</option>
		        <option value="10">Auto et Moto</option>
		        <option value="11">Autres</option>
		    </select> 
		   
		   <br/>
		    
		    Description de l'objet : <input type="text" name="description_obj" />
		    <br/>

		    Quantité : <input type="number" min="1" name="nbr_obj" value="1" />

		    <br />
		    
		    Prix minimum demandé : <input type="number" min="0" name="prix"/> , <input type="number" min="0" max="99" name="cts"/> €
		    <br/>
		    
		    Date d'enchère : 
		    <input type="number" min="1" max="31" name="jour" placeholder="Jour"/> /
		    <input type="number" min="1" max="12" name="mois" placeholder="Mois"/> /
		    <input type="number" min="2015" name="annee" placeholder="Année"/>,
		    <input type="number" min="00" max="23" name="heure" placeholder="00"/> : <input type="number" min="0" max="55" step="5" name="minute" placeholder="00"/>
		    <br/>
		    <br/>
		    
		    <input type="submit" value="Valider"/>
		</form>
		
		<?php require_once(ROOT."\\view\\footer.php"); ?>
		<script type="text/javascript" title="JQUERY" src="../assets/js/jquery.js"></script>
		<script type="text/javascript" title="BOOTSTRAP" src="../assets/js/bootstrap.js"></script>
		<script type="text/javascript" title="MAIN" src="../assets/js/main.js"></script>
	</body>
</html>