<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" lang="fr" content="eshop,brocante, vente, ecommerce," />
	    <meta name="description" content="Votre brocante en ligne" />
	</head>
	<body>
		<p>Déjà inscrit ? <a href="viewConnection.php">Cliquez ici</a></p>
		<form method="post" action="traitementInscription.php">
			<table border="0" width="400" align="center">
				<tr>
					<td width="200"><b>Votre login</b></td>
					<td width="200">
						<input type="text" name="login" placeholder="login" required/>
					</td>
				</tr>

				<tr>
					<td width="200"><b>Votre mot de passe<b></td>
					<td width="200">
						<input type="password" name="mdp" placeholder="password" required/>
					</td>
				</tr>

				<tr>
					<td width="200"><b>Votre adresse mail<b></td>
					<td width="200">
						<input type="text" name="mail" placeholder="contact@brocanteenligne.fr" required/>
					</td>
				</tr>

				<tr>
					<td width="200"><b>Votre age<b></td>
					<td width="200">
						<input type="text" name="age" min="18" required/>
					</td>
				</tr>

				<tr>
					<td width="200"><b>Votre sexe<b></td>
					<td width="200">
						<input type="text" name="sexe" placeholder="f ou m ou t"/>
					</td>
				</tr>

				<tr>
					<td width="200"><b>Votre num&eacute;ro de t&eacute;l&eacute;phone<b></td>
					<td width="200">
						<input type="text" name="telephone"/><!-- On laisse en texte et on traitera le champs à côté -->
					</td>
				</tr>

				<tr>
					<td width="200"><b>Votre photo de profil<b></td>
					<td width="200"> 
						<input type="file" name="img" />  
						<?php if(isset($e)){echo $e;}?>
					</td>
				</tr>

				<tr>
					<td width="200"><b>Votre Commentaire<b></td>
					<td width="200"> 
						<input type="text" name="commentaire" />  
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="submit" name="inscription" value="Je m'inscris"/>
					</td>
				</tr> 
			</table>
		</form>
		<?php require_once(ROOT."\\view\\footer.php"); ?>
	</body>
</html>