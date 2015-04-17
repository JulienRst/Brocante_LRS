<?php
require_once('database.php');

class gestionProfil {

	public function getObjetby($categorie){

	    for($i=1; $i<=11; $i++){
        $rows = $bdd->query("SELECT * FROM 2015eshop_objet WHERE id_categorie = '$i' ORDER BY date_publication ");
        
        $cat_sql = $bdd->query("SELECT nom_categorie FROM 2015eshop_categorie WHERE id_categorie = '$i'");
        while($nom_cat = $cat_sql->fetch()){
            $categorie = $nom_cat["nom_categorie"];
        }
?>
     <hr/>
     <h4 class="text-muted">&bull; <?php echo $categorie?></h4>
     <hr/>
<?php                      
    while($row = $rows->fetch()){
        #Variables
        $id_objet     = $row['id_obj'];
        $nom_obj      = $row['nom_obj'];
        $url_img      = $row['url_img'];
        $prix         = $row['prix'];
        $date_enchere = $row['date_enchere'];
        $date_vendu   = $row['date_vendu'];    
        # S'il existe des objets de la catégorie que l'on parcourt
        if(isset($id_objet)){       
    ?>
            <div>
                <img src='img_obj/<?php echo $url_img?>' alt="<?php echo $nom_obj?>" width="130px" height="auto" /><br/>
                <b><?php echo $nom_obj?></b><br/>
                <?php echo $prix ?> €<br/>
                <a href="objet.php?<?php echo $id_objet?>">+</a><br/><br/>
            </div>
            
    <?php
            }
       }
    }
	}

?>