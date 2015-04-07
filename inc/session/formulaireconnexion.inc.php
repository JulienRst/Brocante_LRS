<?php
/*require_once permet d'appeller seulement une fois les fichiers*/
require_once ROOT."\apply-templates\inc\main\autoload.inc.php";
// Le chargement du header XHTML peut aussi être dans une classe vue en php.
require_once ROOT."\apply-templates\inc\main\connexionbdd.inc.php";
?>

  <form method="post" action="<?php echo $_SESSION['request_url']; ?>">
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

<?php
// Ne pas oublier de fermer proprement la page html.
require_once ROOT.'\apply-templates\inc\footer.inc.php';
?>