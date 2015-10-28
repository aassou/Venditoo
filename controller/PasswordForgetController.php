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
include ('../view/config.php');
//classes loading end
session_start();
if(!empty($_POST['email_fogrot'])){
	$email = htmlspecialchars($_POST['email_fogrot']);
	
	$db = $pdo;
	$userManager = new UtilisateurManager($db);
	$param=0;
	
	$userExist = $userManager->emailExist($email);
	if($userExist == 1){
		$sender = "aassou.abdelilah@gmail.com";
		$message = "Bonjour, avez-vous perdu votre mot de passe ?!<br/>
		Suivez ce lien pour récuperer un mot de passe : <a href=\"/localhost/marocmart_mvc/view/renew_pass.php\">Nouveau mot de passe</a><br>Merci pour votre comprhénsion.";
		mail($email, 'Récuperer mot de passe', $message);
		$param=1;
		header('Location:../view/cont_passeoublie.php?param='.$param);
	}
	else{
		$param = 0;
		header('Location:../view/cont_passeoublie.php?param='.$param);
	}
}
else{
	header('Location:../view/cont_passeoublie.php');
}