<?php

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
//classes loading end
include ('../view/config.php');
//session start
session_start();

$redirectLink="../view/cont_inscription.php";
if(empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['nom']) || 
	empty($_POST['passconf']) || empty($_POST['terme']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==false){
	$_SESSION['error']['inscription']="Vérifiez vos données !!!";
	header('Location:'.$redirectLink);
	exit;
}
elseif(isset($_POST['nom']) and isset($_POST['email']) and isset($_POST['pass']) and isset($_POST['passconf']) 
		and isset($_POST['terme']) and $_POST['pass']===$_POST['passconf']){
		
	$nom = htmlspecialchars($_POST['nom']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['pass']);
	$telefon = 212;
	$ville = "vide";
	$cle =  md5(microtime(TRUE)*100000);
	$actif = 0;
	if(isset($_POST['telefon'])){
		$telefon = filter_var(htmlspecialchars($_POST['telefon']),FILTER_SANITIZE_NUMBER_INT);
	}
	if(isset($_POST['srchVille'])){
		$ville = $_POST['srchVille'];
	}
	try{
		$db = $pdo;
		$utilisateurManager = new UtilisateurManager($db);
		if($utilisateurManager->emailExist($email)!=0){
			header('Location:../view/cont_inscription.php?message=Cet email existe déjà !');
		}
		else{
		$utilisateur = new Utilisateur(array('nom' => $nom, 'prenom' => 'vide', 'telefon' => $telefon, 
		'ville' => 'vide', 'email' =>$email, 'password' => $password, 'image' => '/marocmart_mvc/view/themes/solomoimg/test.png',
		'dateInscription' => date("Y-m-d H:i:s"), 'dateDerniereVisite' => date("0000-00-00 00:00:00"),
'cle' => $cle, 'actif' => $actif));
		$utilisateurManager->add($utilisateur);
		$redirectLink="../view/cont_conf_inscription.php";
		//préparation pour l'envoi d'un mail activation
		$destination = $email;
		$sujet = "Activez votre compte sur BootShop";
		$entete = "From : bootshop@ninja.zz.mu";
		$message = 'Bienvenue sur VotreSite, Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou copier/coller dans votre navigateur internet.
 
http://ninja.zz.mu/view/validation.php?log='.urlencode($email).'&cle='.urlencode($cle).'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';
		mail($destination, $sujet, $message, $entete );
		header('Location:'.$redirectLink);
		exit;
	}
}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
}
?>