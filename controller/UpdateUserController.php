<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 18/11/2013
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
include('../view/config.php');
	//classes loading end
	session_start();
	
	$db = $pdo;
	$utilisateurManager = new UtilisateurManager($db);
	
	$image1 = imageProcessing($_FILES['image_profil']);
	//this block test if the picture isn't set
	if($image1=="../view/themes/images/logo_bootshop.png"){ 
		$image1 = $_SESSION['utilisateur']->image();
	}

	if(isset($_POST['srchVille']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['telefon'])){
		$ville = htmlspecialchars($_POST['srchVille']);
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$email = htmlspecialchars($_POST['email']);
		$telefon = htmlspecialchars($_POST['telefon']);
		$idUtilisateur = htmlspecialchars($_SESSION['utilisateur']->id());
		$password = $_SESSION['utilisateur']->password();
		
		$utilisateur = new Utilisateur(array('id' => $idUtilisateur,'nom' => $nom, 'prenom' => $prenom,
									'telefon' => $telefon, 'ville' => $ville, 'email' => $email,
									'password' => $password, 'image' => $image1));
		try{
			$db = $pdo;
			$utilisateurManager = new UtilisateurManager($db);
			$utilisateurManager->update($utilisateur);
			
			$_SESSION['utilisateur'] = $utilisateurManager->getUtilisateur2($_SESSION['utilisateur']->id());
		}
		catch(Exception $e){
			die('Error : '.$e->getMessage());
		}
	}
	header('Location:../view/myprofil.php');
?>