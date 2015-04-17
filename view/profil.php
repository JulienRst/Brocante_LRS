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
		

		<!-- **** PROFIL **** -->

		<div class="container"><h3 class="text-muted">Profil</h3></div>


		
		    <!--header('Content-Type: text/html; charset=utf-8');
		    require_once"../model/database.php";
		    $database = new database();
		    exit(); -->
		<bouton><a href="vente.php">Vendre un autre objet</a></bouton>

	

	<!--  aller chercher le tableau du controleur de la vue des objets->
		<!-- **** OBJETS ****--> 

 	<div class="container"><h4 class="text-muted">Mon armoire</h4></div>
	
	<?php		
		/*foreach ($array as $objet) {
			echo($objet["nom"].$objet["description"]);
		}*/
		
		require_once(ROOT."\\view\\footer.php"); ?>

	</body>
</html>