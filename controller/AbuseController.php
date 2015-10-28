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
session_start();
try{
	$db = $pdo;
	$annonceManager = new AnnonceManager($db);
	$annonceManager->signalAbuse($_SESSION['annonce']->id());
	header('Location:../view/cont_detailproduit.php');
}
catch(Exception $e){
	die('Error : '.$e.getMessage());
}