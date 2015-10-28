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
include('../view/config.php');	
	session_start();

	if(isset($_POST['current_pass']) and isset($_POST['new_pass']) and isset($_POST['new_pass_confirm'])){
		$password1 = htmlspecialchars($_POST['current_pass']);
		$password2 = htmlspecialchars($_POST['new_pass']);
		$password3 = htmlspecialchars($_POST['new_pass_confirm']);
		$idUtilisateur = $_SESSION['utilisateur']->id();
		if(sha1($password1)==$_SESSION['utilisateur']->password() and $password2==$password3){			
			try{
				$db = $pdo;
				$utilisateurManager = new UtilisateurManager($db);
				$utilisateurManager->updatePassword($idUtilisateur, $password2);
				
				$_SESSION['utilisateur'] = $utilisateurManager->getUtilisateur2($_SESSION['utilisateur']->id());
			}
			catch(Exception $e){
				die('Error : '.$e->getMessage());
			}
		}
	}
	header('Location:../view/myprofil.php');
?>