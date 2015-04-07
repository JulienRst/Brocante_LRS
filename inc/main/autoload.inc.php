<!--  CHARGEMENT DES PAGES PHP orienté objet -->
<?php
	if (defined("AUTOLOAD"))
	{
	    function __autoload($leNomDeLaClasse)
	    {
		$nomACharger='./inc/'.$leNomDeLaClasse.'.inc.php';
		if (file_exists($nomACharger))
		    require_once($nomACharger);
		else
		    die("Erreur : La classe ".$leNomDeLaClasse." est introuvable !");
		    
	    }
	}
	else
	{
	    die ("Erreur, violation du chargement de ".$_SERVER['SCRIPT_NAME'] );	
	}
?>