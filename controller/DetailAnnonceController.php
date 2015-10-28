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
	include("../view/config.php");
	session_start();
	//classes loading end
	
	$db = $pdo;
	$annoncesManager = new AnnonceManager($db);
	$utilisateurManager = new UtilisateurManager($db);
	
	//get the unique annonce by id begin
	$id = 0;
	if (isset($_GET['id'])){
		if($_GET['id']>0 and $_GET['id'] <= $annoncesManager->getLastId()){
			$id = $_GET['id'];
		}
		else{
			$id = 1;
		}
		//$annoncesManager->addOneToPriority($id);
		$_SESSION['annonce'] = $annoncesManager->getAnnonceById($id);
		$idCat = $_SESSION['annonce']->idCategorie();
		$idAnnonce = $_SESSION['annonce']->id();
		$_SESSION['advertiser'] = $utilisateurManager->getUtilisateur2($_SESSION['annonce']->idUtilisateur());
		$_SESSION['annoncesim'] = $annoncesManager->getSimilarAnnonce($idCat, $idAnnonce);
		header('Location:../view/cont_detailproduit.php');
	}
	else{
		header('Location:index.php');
	}
	//get the unique annonce by id end
	
	//get the list of similar product begin
	
	//get the list of similar product end