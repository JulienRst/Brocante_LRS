<?php
/*define('ROOT', __DIR__.'/../');*/ /*même chose que la ligne précédente*/
define('ROOT', __DIR__.'\..\\'); // Racine locale du site
define('URLBASE', 'http://localhost');/* va être utilisé pour la connexion/inscription du client */
// Utilisation de constantes pour bloquer le chargement des bibliothèques.
define('AUTOLOAD',true);
define('HTML',true);  
?>