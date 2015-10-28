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
//classes loading end
	session_start();
$_SESSION['source_page'] = $_SERVER['PHP_SELF'];
	if(isset($_SESSION['utilisateur'])){
		include_once('../include/meta_header_loged.php');
	}
	else{
		header('Location:cont_login.php');
	}
	include('config.php');
?>
	<div id="mainBody">
		<div class="container">
			<div class="row">
				<?php
					include_once('../include/meta_sidebar.php');
				?>
				<div class="span9">	
					<h3>
						<img style="width:100px; height:100px; border:1px dashed; margin-right:10px;" src="<?php echo $_SESSION['utilisateur']->image(); ?>" alt="C'est moi !!" />
						Bonjour <?php echo strtoupper($_SESSION['utilisateur']->nom()); ?>
						<img style="width:60px;height:60px;" src="themes/img/balloon.png" alt="Bonjour !!" title="Bonjour !!">
					</h3>
					<?php
						//include_once('meta_featured_products.php');
						//include_once('meta_latest_products.php');
					?>
					<ul class="breadcrumb">
						<li><a href="myads.php">Mes annonces</a><span class="divider">/</span></li>
						<li class="active">Mon compte</li>
					</ul>
					<h4>Mes informations personnelles</h4>
					<div class="row">
					
					<!--div class="span1"> &nbsp;</div-->
					<div class="span9">
						<div class="well">
							<form>
							<br/><br/>
								<div class="control-group">
									<div class="controls">
										<label class="span3">Nom&nbsp;</label>
										<input class="span4" type="text" name="nom" value="<?php echo $_SESSION['utilisateur']->nom();?>" disabled>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label class="span3">Prénom&nbsp;</label>
										<input class="span4" type="text" name="nom" value="<?php echo $_SESSION['utilisateur']->prenom();?>" disabled>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label class="span3">Email</label>
										<input class="span4"  type="text" name="email" value="<?php echo $_SESSION['utilisateur']->email();?>" disabled>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label class="span3">Téléphone&nbsp;</label>
										<input class="span4"  type="text" name="telefon" value="<?php echo $_SESSION['utilisateur']->telefon();?>" disabled>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label class="span3">Ville&nbsp;</label>
										<input class="span4"  type="text" name="ville" value="<?php echo ucfirst($_SESSION['utilisateur']->ville());?>" disabled>
									</div>
								</div>
								<div class="controls">
									<label class="span3"></label>
									<a href="#update" role="button" data-toggle="modal" class="btn btn-success btn-medium">Modifier mes informations&nbsp;<i class="icon-white icon-cog"></i></a>
									<a href="#change_pass" role="button" data-toggle="modal" class="btn btn-warning btn-medium">Changer mot de passe&nbsp;<i class="icon-white icon-refresh"></i></a>
								</div>
							</form>
							<div id="update" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h3>Modifiez l'annonce</h3>
										</div>
										<div class="modal-body">
											<form class="form-horizontal loginFrm" class="span9" action="../controller/UpdateUserController.php" method="post" enctype="multipart/form-data">
												<div class="control-group">
													<label class="right-label-max" for="image_profil">Image profil</label>
													<input class="input-file" type="file" name="image_profil" /><br />
												</div>
												<div class="control-group">
													<label class="right-label-max">Nom</label>
													<input name="nom" type="text" class="span3" value="<?php echo $_SESSION['utilisateur']->nom();?>" />
												</div>
												<div class="control-group">
													<label class="right-label-max">Prénom</label>
													<input name="prenom" type="text" class="span3" value="<?php echo $_SESSION['utilisateur']->prenom();?>" />
												</div>
												<div class="control-group">
													<label class="right-label-max">Email</label>
													<input name="email" type="text" class="span3" value="<?php echo $_SESSION['utilisateur']->email();?>" />
												</div>
												<div class="control-group">
													<label class="right-label-max">Ville</label>
													<select name="srchVille" class="srchTxt">
														<option value="Nador" selected>Nador </option>
														<option value="Beni Ansar">Beni Ansar</option>
														<option value="Al Aaroui">Al Aaroui</option>
														<option value="Sélouane">Sélouane</option>
														<option value="Zeghanghane">Zeghanghane</option>
														<option value="Zaio">Zaio</option>
														<option value="Ras El Ma">Ras El Ma</option>
														<option disabled>-------------------------</option>
														<option value="Al Hoceima">Al Hoceima</option>
														<option value="Oujda">Oujda</option>
														<option value="Berkane">Berkane</option>
														<option value="Tanger">Tanger</option>
														<option value="Tétouan">Tétouan</option>
														<option value="Rabat">Rabat</option>
														<option value="Casablanca">Casablanca</option>
														<option value="Fès">Fès</option>
														<option value="Meknes">Meknes</option>
													</select> 
												</div>
												<div class="control-group">
													<label class="right-label-max">Téléphone</label>
													<input name="telefon" type="text" class="span3" value="<?php echo $_SESSION['utilisateur']->telefon();?>" />
												</div>
												<div class="control-group">
													<label class="right-label-max"></label>
													<button type="submit" class="btn btn-success" aria-hidden="true">Modifier</button>
													<button class="btn" data-dismiss="modal"aria-hidden="true">Annuler</button>
												</div>
											</form>
										</div>
									</div>
								<br />
								<div id="change_pass" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h3>Modifiez mot de passe</h3>
										</div>
										<div class="modal-body">
											<form class="form-horizontal loginFrm" class="span9" action="../controller/UpdatePassword.php" method="post" enctype="multipart/form-data">
												<div class="control-group">
													<label class="right-label-max">Entrez mot de passe actuel</label>
													<input name="current_pass" type="password" class="span3" value="" />
												</div>
												<div class="control-group">
													<label class="right-label-max">Tapez nouveau mot de passe</label>
													<input name="new_pass" type="password" class="span3" value="" />
												</div>
												<div class="control-group">
													<label class="right-label-max">Retapez nouveau mot de passe</label>
													<input name="new_pass_confirm" type="password" class="span3" value="" />
												</div>
												<div class="control-group">
													<label class="right-label-max"></label>
													<button type="submit" class="btn btn-warning" aria-hidden="true">Modifier</button>
													<button class="btn" data-dismiss="modal"aria-hidden="true">Annuler</button>
												</div>
											</form>
										</div>
									</div>
								<br />
						</div>
						</div>
						<div class="span9">
							<h4>Les informations de mes annonces</h4>
							<div class="well">
							<?php
								$db = $pdo;
								$annonceManager = new AnnonceManager($db);
								
							?>
							
								<form><br/>
									<div class="control-group">
										<div class="controls">
											<label class="span3">Total de mes annonces&nbsp;</label>
											<input class="span2"  type="text" name="mesannonce" value="<?php echo $annonceManager->getCountByUserId($_SESSION['utilisateur']->id());?>" disabled>
										</div>
									</div>
								</form>
							</div>
						</div>
						
				</div>
			</div>
		</div>
	</div>
<?php
		include_once('../include/meta_footer.php');
?>