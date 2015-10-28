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
				
				<ul class="breadcrumb">
					<li><a href="index.php">Accueil</a> <span class="divider">/</span></li>
					<li class="active">Connexion</li>
				</ul>
				<div class="row">					
					<div class="span5">
						<div class="well">
							<h5>Connectez-vous</h5><br />
							<form action="../controller/ConnexionController.php" method="post">
								<div>
									<label class="right-label">Email</label>
									<input name="email" class="span3"  type="text" placeholder="Email">
								</div><br/>
								<div>
									<label class="right-label">Mot de passe</label>
									<input name="password" type="password" class="span3"  placeholder="Mot de passe">
									<a href="forgetpass.html" style="color:red;">&nbsp;Oublié ?</a>
								</div>
							  <div class="control-group">
								<div class="controls">
									<label class="right-label"></label>
									<button type="submit" class="btn btn-success" aria-hidden="true">Connecter</button>
								</div>
							  </div>
							  <?php if(isset($_SESSION['error']['connexion'])){?>
								<div class="alert alert-error">
									<p><?php echo ucfirst($_SESSION['error']['connexion']); ?></p>
								</div>
							<?php } ?>
							</form>
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