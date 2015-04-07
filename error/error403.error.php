<?php
define('ROOT', dir(__DIR__)); // Racine locale du site

// Utilisation de constantes pour bloquer le chargement des bibliothèques.
define('AUTOLOAD',true);
define('HTML',true);  
require_once ROOT.'\inc\main.inc.php';
?>

<!-- *** 403 ERROR *** -->
<div class="container text-center">
	<div class="logo-404">
		<a href="index.php"><span>E</span>-Shop</a>
	</div>
	<div class="content-404">
		<img src="img/error/404.png" class="img-responsive" alt="" />
		<h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
		<p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
		<h2><a href="index.php">Bring me back Home</a></h2>
	</div>
</div>


<?php
// Ne pas oublier de fermer proprement la page html.
require_once ROOT.'\inc\footer.inc.php';
?>