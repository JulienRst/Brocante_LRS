<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" lang="fr" content="eshop,brocante, vente, ecommerce," />
	    <meta name="description" content="Votre brocante en ligne" />
	</head>
	<body>
		<p>Pas encore inscrit ? <a href="viewInscription.php">Cliquez ici</a></p>
		<form method=post action="traitementConnection.php">
			<table border="0" width="400" align="center">
				<tr>
					<td width="200"><b>Votre login</b></td>
					<td width="200">
						<input type="text" name="login" placeholder="login" required>
					</td>
				</tr>
				<tr>
					<td width="200"><b>Votre mot de passe<b></td>
					<td width="200">
						<input type="password" name="mdp" placeholder="password" required>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="connexion" value="valider">
					</td>
				</tr> 
			</table>
		</form>
		<?php require_once(ROOT."\\view\\footer.php"); ?>
	</body>
</html>