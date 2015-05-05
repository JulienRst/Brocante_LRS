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
		<?php require_once(ROOT."\\view\\nav.php"); ?>
			
			<!-- on gere l'affichage des pages ici -->
			<!--  **** RECHERCHER OBJET ****  -->
			<form action="" method="post">
    
    			Nom de l'objet : 
			    <input type="text" name="nom_obj" />
			    <br/>
			    
			    Nom du vendeur : 
			    <input type="text" name="nom_vendeur" />
			    <br/>
			    
			    Catégorie de l'objet : 
			    <select name="categorie">
			        <option value="0" selected>Toutes les catégories</option>
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
			    
			    <input type="submit" value="Valider"/>
			</form>


			<?php
				if(count($tab_resultat) != 0){
					foreach ($tab_resultat as $article) {
						$article->printObject();
					}
				}

			?>

		<?php require_once(ROOT."\\view\\footer.php"); ?>

		<script type="text/javascript" title="JQUERY" src="../assets/js/jquery.js"></script>
		<script type="text/javascript" title="BOOTSTRAP" src="../assets/js/bootstrap.js"></script>
		<script type="text/javascript" title="MAIN" src="../assets/js/main.js"></script>
	</body>
</html>