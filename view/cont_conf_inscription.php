<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 07/10/2013
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
			<h3>Informations de confirmation du compte</h3>
				<div>
					<p style="font-size:18px;">Votre compte a été créé avec succés! Il suffit de l'activer en accédant à votre boite et suivre le lien envoyé.<br />Si vous trouverez pas le lien dans la boite, vérifier la section des spams!</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	include_once('../include/meta_footer.php');
?>