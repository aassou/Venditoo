<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 08/10/2013
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
	include ('../view/config.php');
	//classes loading end
	session_start();
	$redirectLink = "../view/addads.php";
	$email = "";
	$password = "";
	$titre = "";
	$prix = 0;
	$image = "";
	$idCategorie = 0;
	$description = "";
	$datePublication = date("Y-m-d H:i:s");
	$priority = 0;
	$abuse = 0;
	$vendu = "non";
	$actif = 0;
	$cle = md5(microtime(TRUE)*100000);
	//test if the user session is not set
	if(empty($_SESSION['utilisateur'])){
		if(isset($_POST['email']) and isset($_POST['password']) and filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==true and isset($_POST['telephone'])){
			$email = htmlspecialchars($_POST['email']);
			$password = htmlspecialchars($_POST['password']);
			$telephone = 'vide';
			$telephone= filter_var(htmlspecialchars($_POST['telephone']),FILTER_SANITIZE_NUMBER_INT);
			
			try{
				$db = $pdo;
				$utilisateurManager = new UtilisateurManager($db);
				//test if the user dosen't exist and create it
				
				if($utilisateurManager->exists($email, $password)!=1){
					if($utilisateurManager->emailExist($email)==1){
						$_SESSION['error']['addads'] = 'Un utilisateur existe déjà avec cet email!';
						header('Location:../view/addads.php');
					}
					else{
						$utilisateur = new Utilisateur(array('nom' => 'vide', 'prenom' => 'vide', 
						'telefon' => $telephone, 'ville' => 'vide', 'email' =>$email, 'password' => $password, 
						'image' => '../view/themes/images/logo_bootshop.png', 
						'dateInscription' => date("Y-m-d H:i:s"), 'dateDerniereVisite' => date("0000-00-00 	00:00:00"), 'cle' => $cle, 'actif' => $actif));
						$utilisateurManager->add($utilisateur);
						$_SESSION['utilisateur'] = $utilisateurManager->getUtilisateur($email, $password);
						//préparation pour l'envoi d'un mail activation
						$destination = $email;
						$sujet = "Activez votre compte sur BootShop";
						$entete = "From : bootshop@ninja.zz.mu";
						$message = 'Bienvenue sur BootShop, Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou copier/coller dans votre navigateur internet.
 
http://ninja.zz.mu/view/validation.php?log='.urlencode($email).'&cle='.urlencode($cle).'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';
						mail($destination, $sujet, $message, $entete );
						
					}				
				}
				else{
					$_SESSION['utilisateur'] = $utilisateurManager->getUtilisateur($email, $password);
				}
			}
			catch(Exception $e){
				die('Error : '.$e->getMessage());
			}
		}
		else{
			$_SESSION['error']['addads'] = 'Vérifiez vos données de connexion !';
			header('Location:../view/addads.php');
		}
	}
	if(isset($_SESSION['utilisateur'])){
		//session process is done		
		if(!empty($_POST['srchVille']) and !empty($_POST['srchCat']) and !empty($_POST['titre']) and !empty($_POST['description']) and !empty($_POST['prix']) and filter_var($_POST['prix'], FILTER_VALIDATE_FLOAT)!=false){
			$ville = htmlspecialchars($_POST['srchVille']);
			$titre = htmlspecialchars($_POST['titre']);
			$description = htmlspecialchars($_POST['description']);
			$prix = $_POST['prix'];
			$idUtilisateur = $_SESSION['utilisateur']->id();
			$idCategorie = $_POST['srchCat'];
			//image processing begin
			$image = imageProcessing($_FILES['image_upload1']);
			$image2 = imageProcessing($_FILES['image_upload2']);
			$image3 = imageProcessing($_FILES['image_upload3']);
			//image processing end
			//ads adding begin
			$annonce = new Annonce(array('titre'=>$titre,
					  'description'=>$description,
					  'image'=>$image,
					  'image2'=>$image2,
					  'image3'=>$image3,
					  'datePublication'=>$datePublication,
					  'priorite'=>1,
					  'prix'=>$prix,
					  'ville' => $ville,
					  'abuse' => 1,
					  'vendu' => 'non',
					  'idUtilisateur' => $idUtilisateur,
					  'idCategorie' => $idCategorie,
					  'abuse' => $abuse,
					  'vendu' => $vendu)); 
			$db = $pdo;
			$annoncesManager = new AnnonceManager($db);
			$annoncesManager->add($annonce);
			$_SESSION['addinfo'] = "Votre annonce a été ajouter avec succès !";
			if($_SESSION['utilisateur']->actif()==0){
				session_destroy();
				header('Location:../view/cont_conf_inscription.php');
				exit;
			}
			//ads adding end
			header('Location:../view/myads.php');
		}
		else{
			$_SESSION['error']['addads'] = 'Vérifiez les données de votre annonce !';
			header('Location:'.$redirectLink);
		}
	}
?>