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
	include('../view/image_processing.php');
	include('../view/config.php');
	//classes loading end
	session_start();
	
	$db = $pdo;
	$annoncesManager = new AnnonceManager($db);
	$annoncesManager->delete($_GET['id'],$_SESSION['utilisateur']->id());
	header('Location:../view/myads.php');
?>