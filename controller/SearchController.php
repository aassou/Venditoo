<?php
	/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 08/10/2013
*/

//*********************** autoload begin *****************************
	function classLoad ($myClass) {
		if(file_exists('../model/'.$myClass.'.class.php')){
			include('../model/'.$myClass.'.class.php');
		}
        elseif(file_exists('../controller/'.$myClass.'.class.php')){
			include('../controller/'.$myClass.'.class.php');
		}
    }
    spl_autoload_register("classLoad");
//*********************** autoload end ********************************
include('../view/config.php');	
session_start();
	//search processing begin
	$ville = "";
	$recherche = "";
	if(!empty($_POST['srchVille']) or !empty($_POST['recherche'])){
		$ville = htmlspecialchars($_POST['srchVille']);
		$recherche = htmlspecialchars($_POST['recherche']);
		$db = $pdo;
		$annonceManager = new AnnonceManager($db);
		$_SESSION['resultat_recherche'] = $annonceManager->getAnnoncesBySearch($recherche, $ville);
		header('Location:../view/resultat_recherche.php');
	}
	else{
		$link = $_SESSION['source_page'];
		header("Location:".$link);
	}