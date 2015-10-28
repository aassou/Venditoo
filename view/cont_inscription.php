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
				<!-- Module inscription begin -->
				<ul class="breadcrumb">
					<li><a href="index.php">Accueil</a> <span class="divider">/</span></li>
					<li class="active">Inscription</li>
				</ul>
									<!--div class="span1"> &nbsp;</div-->
					<div class="span5">
						<div class="row">
						<div class="well">
							<h4>Vous n'avez pas un compte ? Créez le, Maintenant !</h4><br/>
							<form method="post" action="../controller/InscriptionController.php" >
								<div class="control-group">
									<div class="controls">
										<label class="right-label-large">Nom&nbsp;<sup style="color:red">*</sup></label>
										<input class="span3" type="text" name="nom" placeholder="Nom">
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label class="right-label-large">Email&nbsp;<sup style="color:red">*</sup></label>
										<input class="span3"  type="text" name="email" placeholder="Email">
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label class="right-label-large">Mot de passe&nbsp;<sup style="color:red">*</sup></label>
										<input class="span3"  type="password" name="pass" placeholder="Mot de passe">
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label class="right-label-large">Retapez mot de passe&nbsp;<sup style="color:red">*</sup></label>
										<input class="span3"  type="password" name="passconf" placeholder="Retapez votre mot de passe">
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label class="right-label-large">Téléphone&nbsp;</label>
										<input class="span3"  type="text" name="telefon" placeholder="tél">
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<label class="right-label-large">Ville&nbsp;</label>
										<select name="srchVille" class="srchTxt span3">
											<option value="Nador" selected>NADOR </option>
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
								</div>
								<div class="control-group">
									<div class="controls">
										<label class="right-label-large"></label>
										<input type="checkbox" name="terme" id="terme">
										<label for="terme" style="display:inline-block">J'accepte <a href="#" class="alert-success"><em>les conditions d'utilisation<em></a></label>
									</div>
								</div>
								<div class="controls">
									<label class="right-label-large"></label>
									<button type="submit" class="btn block btn-success">Créez votre compte</button>
																	
								</div><br/>
								<?php if(isset($_SESSION['error']['inscription'])){ ?>
								<div class="alert alert-error">
									<p><?php echo ucfirst($_SESSION['error']['inscription']); ?></p>
								</div>
								<?php }?>
								<br />
								<label style="color:red;">*&nbsp;&nbsp;:&nbsp;Champs obligatoires.</label>
							</form>
						</div>
						</div>
					</div>
			<!-- Module inscription end -->
			</div>
		</div>
	</div>
</div>	
<?php
		include_once('../include/meta_footer.php');
		}
?>