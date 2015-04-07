<?php
if (defined("HTML"))
{
    ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
	     <title>Titre de la page</title>
	     <meta name="keywords" lang="fr" content="eshop,brocante, vente, ecommerce," />
	     <meta name="description" content="Votre brocante en ligne" />
	     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	     <meta http-equiv="Content-Language" content="fr" />
	     <!-- <meta http-equiv="Content-Script-Type" content="text/javascript" /> -->
	     <link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
    <?php
}
else
{
    die ("Erreur, violation du chargement de ".$_SERVER['SCRIPT_NAME']);
}

?>