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
include("config.php");
include("../lib/pass_generator.php");
//classes loading end
session_start();
$_SESSION['source_page'] = $_SERVER['PHP_SELF'];
	if(isset($_SESSION['utilisateur'])){
		header('Location:index.php');
	}
	else{
		include_once('../include/meta_header.php');
?>
	<div id="mainBody">
		<div class="container">
			<div class="row">
				<?php
					include_once('../include/meta_sidebar.php');
				?>
				<div class="span9">	
						<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Accueil</a></li>
    </ul>
	<h3>Avez-vous oublié votre mot de passe ?</h3>	
	<hr class="soft"/>
	<div class="row">
		<div class="span5" style="min-height:900px">
			<div class="well">
			<h5>Récupérez votre mot de passe</h5><br/>
			<?php if(isset($_GET['log']) and isset($_GET['cle'])){
				$email = htmlspecialchars($_GET['log']);
				$cle = $_GET['cle'];
				$db = $pdo;
				$userManager = new UtilisateurManager($db);
				if($userManager->emailExist($email)!=0){
					$user = $userManager->getUserByEmail($email);
					$clebd = $user->cle();
					$actif = $user->actif();
					$idUser = $user->id();
					if($actif==1 and $cle==$clebd){
						$pass = random_password();
						$userManager->updatePassword($idUser, $pass);
						$destination = $email;
						$sujet = "Nouveau mot de passe sur BootShop";
						$entete = "From : bootshop@ninja.zz.mu";
						$message = 'Bienvenue sur ninja.zz.mu, vous avez réussi à renouveler votre mot de passe.
						Votre nouveau mot de passe est '.$pass.
			 
			 
						'---------------
						Ceci est un mail automatique, Merci de ne pas y répondre.';
						mail($destination , $sujet , $message , $entete );
						echo "<p>Consultez votre boite email pour récuperer votre mot de passe !</p>"; 
					}
						else{
							echo "<p>Cet Email n'est pas encore activé, veuillez consulter votre boite Email.</p>";
						}
					}
				else{
					echo "<p>Cet Email n'existe pas !</p>";
				}
			}?>
		</div>
		</div>
	</div>
</div>
				</div>
			</div>
		</div>
	</div>
<?php
		include_once('../include/meta_footer.php');
		}
?>