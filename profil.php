<?php
/*define('ROOT', __DIR__.'/../');*/ /*même chose que la ligne précédente*/
define('ROOT', __DIR__); // Racine locale du site
define('URLBASE', 'http://localhost');/* va être utilisé pour la connexion/inscription du client */
// Utilisation de constantes pour bloquer le chargement des bibliothèques.
define('AUTOLOAD',true);
define('HTML',true);  

require_once ROOT.'\inc\main.inc.php';

/*Faire requete pour affiche en tableau l'ensemble des objets mis en vente*/


// Ne pas oublier de fermer proprement la page html.
require_once ROOT.'\inc\footer.inc.php';
?>