<?php
/*require_once permet d'appeller seulement une fois les fichiers*/
require_once ROOT."\inc\main\autoload.inc.php";
// Le chargement du header XHTML peut aussi être dans une classe vue en php.
require_once ROOT."\inc\main\connexionbdd.inc.php";

/*Gestion des erreurs du téléchargement de photo*/

    # Upload des images dans un dossier
    if(!empty($_FILES)){
        $img = $_FILES['img'];
        # Extension du fichier
        $ext = strtolower(substr($img['name'],-3));
        $ext_autorise = array('jpg','png','gif');
   
        if (in_array($ext,$ext_autorise)){
            if(filesize($img['size'] < 101200)) {
                
            } else {
                $e = "<i>Votre fichier est trop lourd.</i>";   
            }
        } else {
            $e = "<i>Votre fichier n'est pas une image.</i>";   
        }
        
    }

    if("submit" == "D&eacute;j&agrave; inscrit ?"){
        require_once ROOT."\inc\session\formulaireconnexion.inc.php";
    }

?>
<!-- Le formulaire d'inscription envoie un mail pour securisé l'acces -->
  <form method="post" action="<?php echo $_SESSION['request_url']; ?>">
   <table border="0" width="400" align="center">
    
    <tr>
        <td width="200"><b>Votre login</b></td>
        <td width="200">
            <input type="text" name="login" placeholder="login" required/>
        </td>
    </tr>
    
    <tr>
        <td width="200"><b>Votre mot de passe<b></td>
        <td width="200">
            <input type="password" name="mdp" placeholder="password" required/>
        </td>
    </tr>

    <tr>
        <td width="200"><b>Votre adresse mail<b></td>
        <td width="200">
            <input type="text" name="mail" placeholder="contact@brocanteenligne.fr" required/>
        </td>
    </tr>

    <tr>
        <td width="200"><b>Votre age<b></td>
        <td width="200">
             <input type="text" name="age" min="18" required/>
        </td>
    </tr>

    <tr>
        <td width="200"><b>Votre sexe<b></td>
        <td width="200">
            <input type="text" name="sexe" placeholder="f ou m ou t"/>
        </td>
    </tr>

    <tr>
        <td width="200"><b>Votre num&eacute;ro de t&eacute;l&eacute;phone<b></td>
        <td width="200">
            <input type="text" name="telephone"/><!-- On laisse en texte et on traitera le champs à côté -->
        </td>
    </tr>

    <tr>
        <td width="200"><b>Votre photo de profil<b></td>
        <td width="200"> 
            <input type="file" name="img" />  
            <?php if(isset($e)){echo $e;}?>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="submit" name="inscription" value="Je m'inscris"/>
        </td>
    </tr> 

    <tr>
        <td colspan="2">
            
        </td>
    </tr> 

   </table>
  </form>

  <form method="post" action="http://localhost/site_v6/inc/session/formulaireconnexion.inc.php">
   <table border="0" width="400" align="center">
        <tr>
            <td colspan="2">
                <input type="submit" value="D&eacute;j&agrave; inscrit ?"/>
            </td>
        </tr> 
   </table>
  </form>  

<?php
// Ne pas oublier de fermer proprement la page html.
require_once ROOT.'\inc\footer.inc.php';
?>