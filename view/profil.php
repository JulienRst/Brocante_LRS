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
		<button><a href="vente.php">Vendre un autre objet</a></button>

	

	<!--  aller chercher le tableau du controleur de la vue des objets->
		<!-- **** OBJETS ****--> 

 		<div class="container"><h4 class="text-muted">Mon armoire</h4>
	
		<?php	
			// $tab[nom] = value --> au foreach cela donne 	$key = $nom et $value = value
			foreach ($tab_categorie as $key => $categorie) {
				echo($key);
				echo("<br>");
				if($categorie != NULL){
					foreach($categorie as $product){
						$product->printObject();
					}
				}
			}
		?>

		<?php require_once(ROOT."\\view\\footer.php");?>
		</div>
		
		<script type="text/javascript" title="JQUERY" src="../assets/js/jquery.js"></script>
		<script type="text/javascript" title="BOOTSTRAP" src="../assets/js/bootstrap.js"></script>
		<script type="text/javascript" title="MAIN" src="../assets/js/main.js"></script>
	</body>
</html>