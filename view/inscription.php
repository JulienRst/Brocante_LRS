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
			<h3 class="text-muted">Inscrivez-vous, vous retrouverez pleins d'objet fun !</h3>
			<form class="form-horizontal" method="post" action="traitementInscription.php">
				<div class="form-group">
					<!-- for : Specifies which form element a label is bound to -->
					<label class="control-label" for="commentaire">Votre login</label>
					<input class="form-control" type="text" name="login" placeholder="login" required/>
				</div>

				<div class="form-group">
					<label class="control-label" for="commentaire">Votre mot de passe</label>
					<input class="form-control" type="password" name="mdp" placeholder="password" required/>
				</div>

				<div class="form-group">
					<label class="control-label" for="commentaire">Votre adresse mail</label>
					<input class="form-control" type="text" name="mail" placeholder="contact@brocanteenligne.fr" required/>
				</div>

				<div class="form-group">
					<label class="control-label" for="commentaire">Votre age</label>
					<input class="form-control" type="text" name="age" min="18" required/>
				</div>

				<div class="form-group">
					<label class="control-label" for="commentaire">Votre sexe</label>
					<input class="form-control" type="text" name="sexe" placeholder="f ou m ou t"/>
				</div>

				<div class="form-group">
					<label class="control-label" for="commentaire">Votre num&eacute;ro de t&eacute;l&eacute;phone</label>
					<input class="form-control" type="text" name="telephone"/><!-- On laisse en texte et on traitera le champs à côté -->
				</div>

				<div class="form-group">
					<label class="control-label" for="commentaire">Votre photo de profil</label>
					<input class="form-control" type="file" name="img"/>  
					<?php if(isset($e)){echo $e;}?>
				</div>

				<div class="form-group">
					<label class="control-label" for="commentaire">Votre Commentaire</label>
					<input class="form-control" name="commentaire" placeholder="Quelque chose sur vous ?" required/>  
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-default">Valider</button>
				</div>	
			</form>
			<p>Déjà inscrit ? <a href="viewConnection.php">Cliquez ici</a></p>
			<?php require_once(ROOT."\\view\\footer.php"); ?>

			<script src="../assets/js/jquery.js"></script>
			<script src="../assets/js/bootstrap.js"></script>
		</div>
	</body>
</html>