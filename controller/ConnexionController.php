<?php

//classes loading begin
function classLoad ($myClass) {
	if(file_exists('../model/'.$myClass.'.class.php')){
		include('../model/'.$myClass.'.class.php');
	}
	if(file_exists('../controller/'.$myClass.'.class.php')){
		include('../controller/'.$myClass.'.class.php');
	}
}
spl_autoload_register("classLoad");
//classes loading end
include ('../view/config.php');
session_start();

$redirectLink='../view/cont_login.php';

if(empty($_POST['email']) || empty($_POST['password'])|| filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==false){
	$_SESSION['error']['connexion']="Vérifiez vos données !!!";
	header('Location:'.$redirectLink);
	exit;
}
else{
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$db = $pdo;
	$utilisateurManager = new UtilisateurManager($db);
	if($utilisateurManager->exists($email, $password) and $utilisateurManager->isActive($email)){
		$utilisateur = $utilisateurManager->getUtilisateur($email, $password);
		$_SESSION['utilisateur'] = $utilisateur;
		$redirectLink='../index.php';
		header('Location:'.$redirectLink);
		exit;
	}
	else{
		$_SESSION['error']['connexion']="Email ou mot de passe incorrecte, ou compte invalide !";
		header('Location:'.$redirectLink);
		exit;
	}
}
?>