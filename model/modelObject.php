<?php
	require_once('database.php');
	require_once('../controller/getRoot.php'); //Normalement on appelle pas un controller depuis un model, mais bon... On est désolé...

	class gestionObject {

		private $pdo;
		private $database;

		private $id_obj;
		private $nom_obj;
		private $id_categorie;
		private $url_img;
		private $id_user;
		private $id_acheteur;
		private $nbr_obj;
		private $description_obj;
		private $prix;
		private $date_enchere;
		private $date_publication;
		private $date_vendu;
		private $id_commande;

		public function getId_obj(){return $this->id_obj;}
		public function getNom_obj(){return $this->id_obj;}
		public function getId_categorie(){return $this->id_categorie;}
		public function getUrl_img(){return $this->url_img;}
		public function getId_user(){return $this->id_user;}
		public function getId_acheteur(){return $this->id_acheteur;}
		public function getNbr_obj(){return $this->nbr_obj;}
		public function getDescription_obj(){return $this->description_obj;}
		public function getPrix(){return $this->prix;}
		public function getDate_enchere(){return $this->date_enchere;}
		public function getDate_publication(){return $this->id_user;}
		public function getDate_vendu(){return $this->date_vendu;}
		public function getId_commande(){return $this->id_commande;}

		/*liaison entre les variables envoyé*/
		//faire un construct avec juste l'id de l'objet et l'id user et récupérer dans le construct le reste des informations à l'aide d'une requête.

		function __construct($id_obj,$nom_obj,$id_categorie,$url_img,$id_user,$id_acheteur,$nbr_obj,$description_obj,$prix,$date_enchere,$date_publication,$date_vendu,$id_commande){
			$this->database = new database();
			$this->pdo = $this->database->getPdo();

			$this->id_obj = $id_obj;
			$this->nom_obj = $nom_obj;
			$this->id_categorie = $id_categorie;
			$this->url_img = $url_img;
			$this->id_user = $id_user;
			$this->id_acheteur = $id_acheteur;
			$this->nbr_obj = $nbr_obj;
			$this->description_obj = $description_obj;
			$this->prix = $prix;
			$this->date_enchere = $date_enchere;
			$this->date_publication = $date_publication;
			$this->date_vendu = $date_vendu;
			$this->id_commande = $id_commande;
		}

		public function printObject(){
			echo ("
				<div>
				<img src='../assets/img/objets/".$this->url_img."' alt='".$this->nom_obj."' width='130px' height='auto'/><br/>
				<b>".$this->nom_obj."</b><br/>
				".$this->prix." €<br/>
				<a href='viewObjet.php?idObj=".$this->id_obj."'>Voir plus</a><br/><br/>
				<a href='eraseObject.php?idObj=".$this->id_obj."'>Supprimer l'objet de l'armoire</a><br/><br/>

				</div>
			");
		}

		public function printBigObject(){
			echo ("
				<div>
				<img src='../assets/img/objets/".$this->url_img."' alt='".$this->nom_obj."' width='250px' height='auto'/><br/>
				<b>".$this->nom_obj."</b><br/>
				<a href='[A REMPLACER DE QUAND ON AURA FAIT LA PAGE PANIER !!]?id=".$this->id_obj."'>* AJOUTER au panier *</a><br/><br/>

				".$this->prix." €<br/>
				Description de l'objet :".$this->description_obj."<br/>
				Date de la mise en vente de l'objet :".$this->date_enchere."<br/>
				</div>
			");
		}

		public function eraseObject($idObject,$idUser){
			//Supprimer la ligne de l'object en récupérarant son id
			$stmt = $this->pdo->prepare("DELETE FROM 2015eshop_objet WHERE id_user = :idUser and id_obj = :idObject");
			$stmt->bindParam(":idUser",$idUser);
			$stmt->bindParam(":idObject",$idObject);

			try {
				$stmt->execute();
			} catch(Exception $e){
				echo $e->getLine().' : '.$e->getMessage();
			}
			//Supprimer l'objet des paniers et envoyer un mail au utilisateur qui avait cet objet dans leur panier (du travail en plus : CHOUETTE !)
		}

		public function vendreObjet(){
			$stmt = $this->pdo->prepare("INSERT INTO 2015eshop_objet(nom_obj,id_categorie,url_img,id_user,id_acheteur,nbr_obj,description_obj,prix,date_enchere,date_publication,date_vendu,id_commande) VALUES (:nom_obj,:id_categorie,:url_img,:id_user,:id_acheteur,:nbr_obj,:description_obj,:prix,:date_enchere,:date_publication,:date_vendu,:id_commande)");
			$stmt->bindParam(':nom_obj',$this->nom_obj);
			$stmt->bindParam(':id_categorie',$this->id_categorie);
			$stmt->bindParam(':url_img',$this->url_img);
			$stmt->bindParam(':id_user',$this->id_user);
			$stmt->bindParam(':id_acheteur',$this->id_acheteur);
			$stmt->bindParam(':nbr_obj',$this->nbr_obj);
			$stmt->bindParam(':description_obj',$this->description_obj);
			$stmt->bindParam(':prix',$this->prix);
			$stmt->bindParam(':date_enchere',$this->date_enchere);
			$stmt->bindParam(':date_publication',$this->date_publication);
			$stmt->bindParam(':date_vendu',$this->date_vendu);
			$stmt->bindParam(':id_commande',$this->id_commande);

			try {
				$stmt->execute();
			} catch(Exception $e){
				echo $e->getLine().' : '.$e->getMessage();
			}
		}
	}
?>