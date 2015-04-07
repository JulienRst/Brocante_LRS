<?php

$GLOBALS['pdo'] = $bdd; //A changer c'est juste pour tester //JULIEN

function estConnecte()
{
	return isset($_SESSION['user']);
}



function connexionCheck()
{
	// Si le client n'est pas connecté, on affiche le formulaire d'inscription
	if(!estConnecte())
	{
		require_once ROOT.'\inc\session\formulaireinscription.inc.php';
		exit();
	}
}

function connexionclient()
{
  $bdd = $GLOBALS['pdo']; // A changer c'est juste pour tester //JULIEN
   
  $loginOK = false;  // cf Astuce

  /* On n'effectue les traitements à la condition que 
   les informations aient été effectivement postées*/
  if ( isset($_POST['login']) && (!empty($_POST['login'])) && isset($_POST['mdp']) && (!empty($_POST['mdp'])) ) {
    $login = $_POST['login'];
    // On va chercher le mot de passe afférent à ce login
    
/* *** COMMENTAIRE ***
 * MOI JAI LIMPRESSION QUE MON UPDATE NE FONCTIONNE PAS ET LA CONNEXION BDD EST PAS ETABLIE */
    $login = $_POST['login'];
    $password = $_POST['mdp'];

    echo('password user : '.$password);


    try{
        //Je précise que $bdd est un objet de classe PDO qui fonctionne pour d'autre requête.
        /*$req = $bdd->prepare("UPDATE login, age, sexe, commentaire, telephone VALUES (:login,:age,:sexe,:commentaire,:telephone) FROM 2015eshop_utilisateur WHERE id_user = :id_user");
        $req->bindParam(':login',$login);
        $req->bindParam(':age',$age);
        $req->bindParam(':sexe',$sexe);
        $req->bindParam(':commentaire',$commentaire);
        $req->bindParam(':telephone',$telephone);
        $req->bindParam(':id_user',$id_user);*/

        $req = $bdd->prepare("SELECT * FROM 2015eshop_utilisateur WHERE login = :login");

        $req->bindParam(':login',$login);

        $req->execute();
    }
    catch (Exception $e){
        echo $e->getMessage();   
    }

    echo('Rowcount : '.$req->rowcount().'<br><br>');
    // On vérifie que l'utilisateur existe bien
    if ($req->rowcount() == 1) {
       $data = $req->fetch(PDO::FETCH_ASSOC);
       echo('password bdd :'.$data['mdp']);
      // On vérifie que son mot de passe est correct
      if ($password == $data['mdp']) {
        $loginOK = true;
      }
    }
  }
  /*else {
    // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    // puis on le redirige vers la page d'accueil
    echo '<meta http-equiv="refresh" content="0;URL=index.htm">';
  }*/


  // Si le login a été validé on met les données en sessions
  echo('test');
  if ($loginOK) 
  {
    echo('YEAH !');
    $_SESSION['user'] = array();
    $_SESSION['user']['login'] = $data['login'];
    $_SESSION['user']['age'] = $data['age'];
    $_SESSION['user']['sexe'] = $data['sexe'];
    $_SESSION['user']['telephone'] = $data['telephone'];
    return true;
  }
  else 
  {
    return false;
  }
}

function deconnexionClient()
{
	unset($_SESSION['user']);
}

/* Renvoit vrai si l'utilisateur vient de remplir 
 * le formulaire de connexion et qu'on doit le connecter.*/
function doitSeConnecter()
{
	return (!empty($_POST['connexion']));
}

/* Renvoit vrai si l'utilisateur vient de remplir 
 * le formulaire d'inscription et qu'on doit l'inscrire.*/
function doitSInscrire()
{
	return (!empty($_POST['inscrire']));
}

function inscriptionClient()
{
  $loginOK = false;  // cf Astuce

  /* On n'effectue les traitements à la condition que 
   les informations aient été effectivement postées*/
  if ((!empty($_POST['login'])) && (!empty($_POST['mdp'])) && 
    (!empty($_POST['telephone'])) && (!empty($_POST['sexe'])) && (!empty($_POST['mail'])) ) 
  {
    //...
    // Votre code
    //...
    // Connexion à la base de données
    //...
    // Vérification des données saisies par l'utilisateur
    //...
    // Enregistrement des données dans la base
    //... 
     
    // Récupération des variables nécessaires au mail de confirmation 
    $email = $_POST['mail'];
    $login = $_POST['login'];
    $tel = $_POST['telephone'];
     
    // Génération aléatoire d'une clé
    $cle = md5(microtime(TRUE)*100000); // uniqid();
     
     
    // Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
    $stmt = $dbh->prepare("UPDATE membres SET cle=:cle WHERE login like :login");
    $stmt->bindParam(':cle', $cle);
    $stmt->bindParam(':login', $login);
    $stmt->execute();
 
 
    // Préparation du mail contenant le lien d'activation
    $destinataire = $email;

        $Corps = "Bonjour,";
        $Corps .= "<BR>";
        $Corps .= "Pour valider votre inscription dans la base de données, ";
        $Corps .= "<a href='http://localhost/IMAC/site_v4/inc/session/confirmation.inc.php?login=";
        $Corps .= $login;
        $Corps .= "&telephone=";
        $Corps .= $tel;
        $Corps .= "&mail=";
        $Corps .= $email;
        $Corps .= "'> veuillez cliquer sur ce lien";
        $Corps .= "</a> s'il vous plait"; 


        $to      = $destinataire;
        $subject = 'Confirmation d\'inscription sur brocante_en_ligne';
        $message = 'Bonjour !'.$Corps;
        $headers = 'From: webmaster@hotmail.fr' . "\r\n" .'Reply-To: will_v@hotmail.fr' . "\r\n" .'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        /*mail("mdefawes@info-3000.com","Confirmation d'inscription" , $Corps , "Content-type: text/html");*/

  }
}
?>