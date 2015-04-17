<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" lang="fr" content="eshop,brocante, vente, ecommerce," />
	    <meta name="description" content="Votre brocante en ligne" />
	    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	</head>
	<body>
		<div class="container">			
			<h3 class="text-muted">Connectez-vous</h3>
			<form class="form-horizontal" method=post action="traitementConnection.php">
				<div class="form-group">
					<label class="control-label" for="login">Votre Login</label> <!-- le label se placera devant l'input -->
					<input class="form-control" type="text" name="login" placeholder="login" required>	
				</div>
				<div class="form-group">
					<label class="control-label" for="mdp">Votre mot de passe</label>
					<input class="form-control" type="password" name="mdp" placeholder="password" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Valider</button>
				</div>
			</form>
			<p>Pas encore inscrit ? <a href="viewInscription.php">Cliquez ici</a></p>
		</div>
		<?php require_once(ROOT."\\view\\footer.php"); ?>
		<script src="../assets/js/jquery.js"></script>
		<script src="../assets/js/bootstrap.js"></script>
	</body>
</html>