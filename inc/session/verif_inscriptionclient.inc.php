<!-- VERIFIE CONNEXION CLIENT -->

<?php
// On démarre la session
/*session_start();*/

function inscriptionclient()
{
  $loginOK = false;  // cf Astuce

  /* On n'effectue les traitements à la condition que 
   les informations aient été effectivement postées*/
  if ( isset($_POST) && (!empty($_POST['login'])) && (!empty($_POST['mdp'])) && 
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
$cle = md5(microtime(TRUE)*100000);
 
 
// Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
$stmt = $dbh->prepare("UPDATE membres SET cle=:cle WHERE login like :login");
$stmt->bindParam(':cle', $cle);
$stmt->bindParam(':login', $login);
$stmt->execute();
 
 
// Préparation du mail contenant le lien d'activation
$destinataire = $email;
?>
    <div id ="mail">
      <?php
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
      ?>

      Merci de votre inscription. Pour la valider, relevez vos E-Mails : 
      un nouveau message vient de vous &ecirc;tre envoy&eacute; avec les instructions n&eacute;cessaires. 
    </div>

<?php
  }
}
?>