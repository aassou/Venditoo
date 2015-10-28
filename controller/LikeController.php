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

include('../view/config.php');
session_start();
$var = "".$_SESSION['annonce']->id()."";
if($_SESSION[$var]['likeClick'] == 0){
	try{
		$db = $pdo;
		$annonceManager = new AnnonceManager($db);
		$annonceManager->addOneToPriority($_SESSION['annonce']->id());
		$_SESSION["$var"]['likeClick'] = 1;
		header('Location:../view/cont_detailproduit.php');
	}
	catch(Exception $e){
		die('Error : '.$e.getMessage());
	}
}
else{
	header('Location:../view/cont_detailproduit.php');
}

?>