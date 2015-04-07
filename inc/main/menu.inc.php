<!-- DEFINITION DU MENU -->
<?php
if (defined("HTML"))
{ ?>
	<!-- NAVIGATION -->
				<div id="mainNav">
						<ul>
							<li>
								<a title="accueil" href="#">Brocante</a>
							</li>
							<li>
								<a title="enchere" href="http://localhost/apply-templates/enchere.php">Encheres</a>
							</li>
							<li>
								<a title="profil" href="http://localhost/apply-templates/profil.php">Armoire</a>
							</li>
						</ul>
				</div>

<?php

/* *** GESTION DU MENU *** */

	if(isset($_GET['page']) && $_GET['page'] == 'profil'){
		include(URLBASE.'\profil.php');
	}
	elseif(isset($_GET['page']) && $_GET['page'] == 'accueil'){
		include(URLBASE);
	}
	elseif(isset($_GET['page']) && $_GET['page'] == 'enchere'){
		include(URLBASE.'\enchere.php');
	}

}
else
{
    die ("Erreur, violation du chargement de ".$_SERVER['SCRIPT_NAME']);
}

?>