<?php
	//On utilise $this devant les informations de connexion car elles sont dans l'objet et même depuis l'intérieur de l'objet on doit passer par l'objet lui même pour y accéder. 
	class database {

		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "imac";

		public function getPdo(){
			try {
				$bdd = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

				/* set the PDO error mode to exception
				* 
				* ATTR_ERRMODE : Les exceptions non attrappées deviennent des erreurs fatales.
				* ERRMODE_EXCEPTION :  "contourner" le point critique de votre code, vous montrer rapidement le problème rencontré
				* et structure notre gestionnaire d'erreur*/

				$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				/*Test de connexion établie*/

				/*echo "Connected successfully<br/>";*/
			} catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage(). "<br/>";
				die();
			}

			return $bdd;
		}
	}
?>