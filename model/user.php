<?php

	require_once('database.php');


	class gestionUser {

		private $database;
		private $pdo;

		/*on recupere l'objet pdo*/
		function __construct(){
			$this->database = new database();
			$this->pdo = $this->database->getPdo();
		}

		public function isThisLogininBDD($login){
			try{
				$req = $this->pdo->prepare("SELECT id_user FROM 2015eshop_utilisateur WHERE login = :login");
				$req->bindParam(':login',$login);
				$req->execute();
			} catch (Exception $e){
				echo $e->getMessage();   
			}

			if ($req->rowcount() == 1) {
				return true;
			} else {
				return false;
			}
		}


		/*Verifier la connexion de l'utilisateur en recupèrant les paramètres de connexion et en les comparant dans la bdd*/
		public function checkConnection($login,$mdp){
			/* On n'effectue les traitements à la condition que les informations aient été effectivement postées*/
			try{
				$req = $this->pdo->prepare("SELECT id_user, mdp FROM 2015eshop_utilisateur WHERE login = :login");
				$req->bindParam(':login',$login);
				$req->execute();
			} catch (Exception $e){
				echo $e->getMessage();   
			}
			// On vérifie que l'utilisateur existe bien
			if ($req->rowcount() == 1) {
				$data = $req->fetch(PDO::FETCH_ASSOC);
				if ($mdp == $data['mdp']) {
					return array("id" => $data['id_user'],"connected" => true);
				} else {
					return array("connected" => false, "error" => "Mot de passe incorrect !");
				}
			} else {
				return array("connected" => false, "error" => "Adresse mail introuvable !");
			}
		}

		public function insertUserInBDD($login,$mdp,$mail,$age,$sexe,$telephone,$commentaire,$clef,$profil_pic){
			// Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
			if(!$this->isThisLogininBDD($login)){
				$req = $this->pdo->prepare("INSERT INTO 2015eshop_utilisateur (login,mdp,profil_pic,mail,age,sexe,telephone,commentaire,clef) VALUES(:login,:mdp,:profil_pic,:mail,:age,:sexe,:telephone,:commentaire,:clef)");
				$req->bindParam(':login',$login);
				$req->bindParam(':mdp',$mdp);
				$req->bindParam(':mail',$mail);
				$req->bindParam(':age',$age);
				$req->bindParam(':sexe',$sexe);
				$req->bindParam(':telephone',$telephone);
				$req->bindParam(':commentaire',$commentaire);
				$req->bindParam(':clef',$clef);
				$req->bindParam(':profil_pic',$profil_pic);
				
				try {
					$req->execute();
				} catch (Exception $e){
					echo $e->getMessage();
				}
			} else {
				//renvoyer un message d'erreur
			}
		}

		public function getUserById($id){
			//bind Param = lier paramètre, il faut le faire après la requête préparée car bindParam est une méthode de cette requête
			$req = $this->pdo->prepare("SELECT id_user, login, age, sexe, telephone, commentaire FROM 2015eshop_utilisateur WHERE id_user = :id");
			$req->bindParam(':id',$id);

			try {
				$req->execute();
			} catch(Exception $e){
				echo $e->getMessage();  
			}

			if($req->rowcount() == 1){
				$data = $req->fetch(PDO::FETCH_ASSOC);
				return $data;
			}
		}
	}
?>