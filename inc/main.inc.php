<?php

/*session star pour avoir toujours mes varaible session */
session_start();
/*require_once permet d'appeller seulement une fois les fichiers*/
require_once ROOT."\inc\main\autoload.inc.php";
// Le chargement du header XHTML peut aussi être dans une classe vue en php.
require_once ROOT."\inc\main\connexionbdd.inc.php";
/* On vérifie que le client est bien connecté et on le redirige dans le cas contraire*/
require_once ROOT."\inc\gestionclient.inc.php";

// stocke l'url demandée par l'utilisateur : utile pour les redirections
$_SESSION['request_url'] = URLBASE.$_SERVER['REQUEST_URI'];


/*Redirection du client s'il n'est pas connecté*/

if(!estConnecte())
{
	if(doitSeConnecter()){
		connexionClient();
	}
	else if(doitSInscrire()){
		inscriptionClient();l
	}
}
// Securité : l'utilisateur doit être connecté pour afficher la suite.
connexionCheck();


//header('location:'.$_SESSION['request_url']);

/*On pense a afficher l'en-tête de la page*/
require_once ROOT."\inc\main\header.inc.php";
require_once ROOT."\inc\main\menu.inc.php";
/*
 * Dans tous les cas on doit passer en mode HTML pour afficher un formulaire
 * Cet affichage peut-être déplacé dans une classe Vue lorsqu'il est plus compliqué.
 */
?>