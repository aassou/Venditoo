<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 13/11/2013
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
	include('../lib/image_processing.php');
include ('../view/config.php');
	//classes loading end
	session_start();
	
	$db = $pdo;
	$annoncesManager = new AnnonceManager($db);
	
	$image1 = "";
	$image2 = "";
	$image3 = "";
	
	$image1 = imageProcessing($_FILES['image_upload1']);
	if($image1=="../view/themes/images/logo_bootshop.png"){
		$image1 = $_SESSION['image1_'.$_GET['id']];
	}
	$image2 = imageProcessing($_FILES['image_upload2']);
	if($image2=="../view/themes/images/logo_bootshop.png"){
		$image2 = $_SESSION['image2_'.$_GET['id']];
	}

	$image3 = imageProcessing($_FILES['image_upload3']);
	if($image3=="../view/themes/images/logo_bootshop.png"){
		$image3 = $_SESSION['image3_'.$_GET['id']];
	}

	
	// $image1 = "../view/themes/images/logo_bootshop.png";
	// $image2 = "../view/themes/images/logo_bootshop.png";
	// $image3 = "../view/themes/images/logo_bootshop.png";
	
	if(isset($_POST['srchCat']) and isset($_POST['srchVille']) and isset($_POST['titre']) and isset($_POST['description']) and isset($_POST['prix'])){
		$categorie = $_POST['srchCat'];
		$ville = $_POST['srchVille'];
		$titre = htmlspecialchars($_POST['titre']);
		$description = htmlspecialchars($_POST['description']);
		$prix = (int) $_POST['prix'];
		$idAnnonce = (int) $_GET['id'];
		$idUtilisateur = $_SESSION['utilisateur']->id();
		
		$annonce = new Annonce(array('id' => $idAnnonce, 'idUtilisateur' => $idUtilisateur,'idCategorie' => $categorie, 'ville' => $ville,
				'titre' => $titre, 'description' => $description, 'prix' => $prix,
				'image' => $image1, 'image2' => $image2, 'image3' => $image3));
		
		$db = $pdo;
		$annonceManager = new AnnonceManager($db);
		$annonceManager->update($annonce);
	}
	header('Location:../view/myads.php');
?>