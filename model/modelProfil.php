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
		public function getObjectById($idObject,$idUser){
			$stmt = $this->pdo->prepare("SELECT * FROM 2015eshop_categorie WHERE id_obj = :idObject and id_user = :idUser");
			$stmt->bindParam(':idObject',$idObject);
			$stmt->bindParam(':idUser',$idUser);

			try {
				$stmt->execute();
			} catch(Exception $e){
				echo $e->getMessage();
			}

			$tmp = $stmt->fetch();

			$object = new gestionObject($tmp["id_obj"],$tmp["nom_obj"],$tmp["id_categorie"],$tmp["url_img"],$tmp["id_user"],$tmp["id_acheteur"],$tmp["nbr_obj"],$tmp["description_obj"],$tmp["prix"],$tmp["date_enchere"],$tmp["date_publication"],$tmp["date_vendu"],$tmp["id_commande"]);
	
			return $object;
		}

	}
?>