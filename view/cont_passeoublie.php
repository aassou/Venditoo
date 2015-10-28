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
include("../view/config.php");
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
			<h5>Rédéfinir votre mot de passe</h5><br/>
			<form action="" method="post">
			  <div class="control-group">
				<div class="controls"><label class="right-label" for="inputEmail1">E-mail</label>
					<input class="span3"  type="text" id="inputEmail1" name="email_fogrot">
				</div>
			  </div>
			  <div class="controls">
			  <label class="right-label"></label>
			  <button type="submit" class="btn block" name="envoyer">Envoyer</button>
			  </div><br/>
			</form>
			<?php if( isset( $_POST['email_fogrot'] ) and isset( $_POST['envoyer'] ) and filter_var( $_POST['email_fogrot'], FILTER_VALIDATE_EMAIL ) == true ){
	$email = htmlspecialchars( $_POST['email_fogrot'] );
	$db = $pdo;
	$userManager = new UtilisateurManager($db);
	if($userManager->emailExist($email)!=0){
		$user = $userManager->getUserByEmail($email);
		$cle = $user->cle();
		$actif = $user->actif();
		if($actif==1){
			$destination = $email;
			$sujet = "Renouvelez votre mot de passe sur Venditoo.com";
			$entete = "From : contact@venditoo.com";
			$message = 'Bienvenue sur venditoo.com, Pour activer votre compte, veuillez cliquer sur le lien ci dessous 		ou copier/coller dans votre navigateur internet.
 
			http://www.venditoo.com/view/nouveau_pass.php?log='.urlencode($email).'&cle='.urlencode($cle).'
 
 
			---------------
			Ceci est un mail automatique, Merci de ne pas y répondre.';
			mail($destination, $sujet, $message, $entete );
			echo '<div class="alert alert-success"><p>Consultez votre boite afin d\'activer votre mot de passe !</p></div>'; 
        }
        else{
            echo '<div class="alert alert-info"><p>Cet Email n\'est pas encore activé, veuillez consulter votre boite Email.</p></div>';
        }
    }
    else{
        echo '<div class="alert alert-error"><p>Cet Email n\'existe pas !</p></div>';
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