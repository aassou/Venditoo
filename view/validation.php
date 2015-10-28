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
	include('config.php');
//classes loading end
	session_start();
	$_SESSION['source_page'] = $_SERVER['PHP_SELF'];
	if(isset($_SESSION['utilisateur'])){
		header('Location:index.php');
	}
	else{
		include_once('../include/meta_header.php');
	}
?>
	<div id="mainBody">
		<div class="container">
			<div class="row">
				<?php
					include_once('../include/meta_sidebar.php');
				?>
				<div class="span9">	
					<h3>Informations de validation du compte</h3>	
					<?php
					$log = "";
					$cle = "";
					if(isset($_GET['log']) and isset($_GET['cle'])){
						$log = $_GET['log'];
						$cle = $_GET['cle'];
						$db = $pdo;
						// Récupération de la clé correspondant au $login dans la base de données
						$stmt = $db->prepare("SELECT cle,actif FROM utilisateur WHERE email like :login ");
						if($stmt->execute(array(':login' => $log)) && $row = $stmt->fetch()){
							$clebdd = $row['cle'];	// Récupération de la clé
							$actif = $row['actif']; // $actif contiendra alors 0 ou 1
						}
						// On teste la valeur de la variable $actif récupéré dans la BDD
					
						if($actif == '1'){
							 echo "Votre compte est déjà actif !";
						}
						// Si ce n'est pas le cas on passe aux comparaisons
						else{
							if($cle == $clebdd){
								  echo 'Votre compte a bien été activé ! <img src="themes/img/balloon.png" alt="Félicitaions" Title="Félicitations" />';
								  $stmt = $db->prepare("UPDATE utilisateur SET actif = 1 WHERE email like :login ");
								  $stmt->bindParam(':login', $log);
								  $stmt->execute();
							}
							else{
								echo "Erreur ! Votre compte ne peut être activé...";
							}
						}					
					}
					?>
				</div>
			</div>
		</div>
	</div>
<?php
		include_once('../include/meta_footer.php');
?>