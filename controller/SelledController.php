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
try{
	$db = $pdo;
	$annonceManager = new AnnonceManager($db);
	$annonceManager->adSelled($_GET['id'],$_SESSION['utilisateur']->id());
	header('Location:../view/myads.php');
}
catch(Exception $e){
	die('Error : '.$e.getMessage());
}
?>