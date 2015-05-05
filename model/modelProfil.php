<?php
	require_once('database.php');
	require_once('modelObject.php');

	class gestionProfil {

		private $database;
		private $pdo;

		/*on recupere l'objet pdo*/
		function __construct(){
			$this->database = new database();
			$this->pdo = $this->database->getPdo();
		}

		public function getObjetby($idUser,$idCategorie){
			$req = $this->pdo->prepare("SELECT * FROM 2015eshop_objet WHERE id_user = :idUser and id_categorie = :idCategorie");
			$req->bindParam(':idUser',$idUser);
			$req->bindParam(':idCategorie',$idCategorie);

			try {
				$req->execute();
			} catch (Exception $e){
				echo $e->getMessage();
			}

			$nbObj = $req->rowcount();
			$result = $req->fetchAll(PDO::FETCH_ASSOC);
			for($i=0;$i<$nbObj;$i++){
				$tmp = $result[$i];

				$result[$i] = new gestionObject($tmp["id_obj"],$tmp["nom_obj"],$tmp["id_categorie"],$tmp["url_img"],$tmp["id_user"],$tmp["id_acheteur"],$tmp["nbr_obj"],$tmp["description_obj"],$tmp["prix"],$tmp["date_enchere"],$tmp["date_publication"],$tmp["date_vendu"],$tmp["id_commande"]);
			}
			return $result;
		}

		public function getAllObjectFor($idUser){
			$stmt = $this->pdo->prepare("SELECT * FROM 2015eshop_categorie");
			try {
				$stmt->execute();
			} catch(Exception $e){
				echo $e->getMessage();
			}
			//Fetch All récupère tout, alors que fetch tout court ne récupère que la première ligne
			$result_ctg = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$allObject;

			foreach ($result_ctg as $categorie) {
				$idCate = $categorie["id_categorie"]; //Récupère l'id de la categorie
				$allObject[$categorie["nom_categorie"]] = $this->getObjetby($idUser,$idCate); // Dans le tableau qui contient tous les objets
				//On met un tableau portant le nom de la categorie et tous les objets "articles" de cette catégorie.
			}

			return $allObject;
		}

		//On récupère l'objet avec son id, et l'id de son user, et ensuite on le transforme en objet
		public function getObjectById($idObject){
			$stmt = $this->pdo->prepare("SELECT * FROM 2015eshop_objet WHERE id_obj = :idObject");
			$stmt->bindParam(':idObject',$idObject);

			try {
				$stmt->execute();
			} catch(Exception $e){
				echo $e->getLine().' : '.$e->getMessage();
			}

			$tmp = $stmt->fetch();

			$object = new gestionObject($tmp["id_obj"],$tmp["nom_obj"],$tmp["id_categorie"],$tmp["url_img"],$tmp["id_user"],$tmp["id_acheteur"],$tmp["nbr_obj"],$tmp["description_obj"],$tmp["prix"],$tmp["date_enchere"],$tmp["date_publication"],$tmp["date_vendu"],$tmp["id_commande"]);
	
			return $object;
		}

        public function searchObject($nom,$vendeur,$categorie){
            $stmt = $this->pdo->prepare("SELECT * FROM 2015eshop_objet WHERE nom_obj = :nom and id_user = :vendeur and id_categorie = :categorie");
            $stmt->bindParam(':nom',$nom);
            $stmt->bindParam(':vendeur',$vendeur);
            $stmt->bindParam(':categorie',$categorie);

            try {
                $stmt->execute();
            } catch(Exception $e){
                echo $e->getLine().' : '.$e->getMessage();
            }

            //on compte le nb de ligne du tableau fetch
            $nbObj = $stmt->rowcount();
            //on ajoute le tableau dans la variable
            $tabResultOfSearch = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //On parcours la variable par son index et on range la ligne dans une variable temporelle
            //Enfin, on implémente dans la variable tabResultOfSearch par un objet d'objet 
            for($i=0;$i<$nbObj;$i++){
                $tmp = $tabResultOfSearch[$i];
                $tabResultOfSearch[$i] = new gestionObject($tmp["id_obj"],$tmp["nom_obj"],$tmp["id_categorie"],$tmp["url_img"],$tmp["id_user"],$tmp["id_acheteur"],$tmp["nbr_obj"],$tmp["description_obj"],$tmp["prix"],$tmp["date_enchere"],$tmp["date_publication"],$tmp["date_vendu"],$tmp["id_commande"]);
            }
            return $tabResultOfSearch;
        }

	}
?>