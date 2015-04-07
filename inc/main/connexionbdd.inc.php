<!-- CONNEXION BDD -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imac";

try 
{
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    /* set the PDO error mode to exception
     * 
     * ATTR_ERRMODE : Les exceptions non attrappées deviennent des erreurs fatales.
     * ERRMODE_EXCEPTION :  "contourner" le point critique de votre code, vous montrer rapidement le problème rencontré
     * et structure notre gestionnaire d'erreur*/

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    /*Test de connexion établie*/
    
    /*echo "Connected successfully<br/>";
    foreach($bdd->query('SELECT * from 2015eshop_utilisateur') as $row) 
    {
        print_r($row);
    }
    $bdd = null;*/
}

catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage(). "<br/>";
    die();
}
?>