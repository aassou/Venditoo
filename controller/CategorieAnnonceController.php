<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 08/10/2013
*/
	//classes loading begin
	function classLoad ($myClass) {
		if(file_exists('../model/'.$myClass.'.class.php')){
			include('../model/'.$myClass.'.class.php');
		}
        elseif(file_exists('../controller/'.$myClass.'.class.php')){
			include('../controller/'.$myClass.'.class.php');
		}
    }
    spl_autoload_register("classLoad");
	include('../view/config.php');
	session_start();
	//classes loading end
	
	//get the list of ads by categorie process begin
	$db = $pdo;
	$annonceManager = new AnnonceManager($db);
	$categorieManager = new CategorieManager($db);
	$categories = array();
	$categoriesNames = array();
	foreach($categorieManager->getCategorieDetailsList() as $categorie){
		$categories[] = $categorie->detail();
	}
	foreach($categorieManager->getCategorieNames() as $categorie){
		$categoriesNames[] = $categorie->nom();
	}
	/*$categories = $categorieManager->getCategorieDetailsList()->detail();*/ /*array('technologie', 'vetement', 'informatique', 'telefon', 'audiovideo', 
				'vetementhomme', 'immobilier', 'santebeaute', 'automoto', 'maisonjardins', 'emploiservice',
				'vetementfemme', 'vetementenfant', 'chaussurehomme', 'chaussurefemme',
				'chaussureenfant', 'maison', 'appartement', 'villa', 'terrain',
				'colocation', 'boutique', 'parfum', 'cosmetic', 'paramedical',
				'voiture', 'moto', 'vehiculepro', 'pieces', 'jeux', 'location_vacance',
				'bateaux', 'electromenager', 'meubleinterieur', 'accessoires', 'montrelunnettes',
				'bijouxaccessoire', 'offreemploi', 'demandeemploi', 'services',
				'cours', 'materielpro', 'bricolage');*/

	if(isset($_GET['cat'])){
		if(in_array($_GET['cat'], $categories) || in_array($_GET['cat'], $categoriesNames )){
			$cat = $_GET['cat'];
			//$_SESSION['annonce'] = array();
			$_SESSION['annonce_categorie'] = $annonceManager->getAnnonceByCategorie($cat);
			header('Location:../view/cont_list_annonces.php?categorie='.$cat);
		}
		else{
			header('Location:../view/cont_annonces.php');
		}
	}
	else{
			header('Location:../view/cont_annonces.php');
	}
	//get the list of ads by categorie process end