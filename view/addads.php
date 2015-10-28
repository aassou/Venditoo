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
		include_once('../include/meta_header_loged.php');
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
			<!-- Module ajouter annonce begin -->
				<ul class="breadcrumb">
					<li><a href="index.php">Accueil</a> <span class="divider">/</span></li>
					<li class="active">Ajouter annonce</li>
				</ul>
				<div class="row">
				<div class="well span5">
					<form class="form-horizontal" method="post" action="../controller/AjoutAnnonceController.php" enctype="multipart/form-data">
						<h4>Informations de l'annonce</h4>
<?php if(isset($_SESSION['error']['addads'])){?>
								<div class="alert alert-error">
									<p><?php echo ucfirst($_SESSION['error']['addads']); ?></p>
								</div>
						<?php unset($_SESSION['error']['addads']);}?>
						<div class="control-group">
							<label class="right-label-large" for="titre">Catégorie <sup style="color:red">*</sup></label>
								<!-- categories selection begin -->
								<select name="srchCat" class="span3">
									<option selected disabled>Chosir une catégorie</option>
									<?php
										$db = $pdo;
										$categorieManager = new CategorieManager($db);
										$listCategorieNames = $categorieManager->getCategorieNames();
										foreach($listCategorieNames as $categorieNames){
										$listCategorieDetails = $categorieManager->getCategorieDetails($categorieNames->nom());
									?>
									<option disabled style="background-color:#f0f0f0;"><?php echo '-------- '.strtoupper($categorieNames->nom()).' --------'; ?></option>
									<?php		
										foreach($listCategorieDetails as $categorieDetails){
									?>
									<option value="<?php echo $categorieDetails->id(); ?>"><?php echo ucfirst($categorieDetails->detail());?></option>
									<?php
										}
										}
									?>
								</select> 
								<!-- categories selection end -->
						</div>
						<div class="control-group">
							<label class="right-label-large" for="srchVille">Ville <sup style="color:red">*</sup></label>
								<select name="srchVille" class="span3">
									<?php include("../include/ville.html"); ?>
								</select> 
						</div>
						<div class="control-group">
							<label class="right-label-large" for="titre">Titre <sup style="color:red">*</sup></label>
							<input type="text" name="titre" id="titre" class="span3">
						</div>
						<div class="control-group">
							<label class="right-label-large" for="description">Description <sup style="color:red">*</sup></label>
							<textarea name="description" id="description" class="span3"></textarea>
						</div>
						<div class="control-group">
							<label class="right-label-large" for="prix">Prix <sup style="color:red">*</sup></label>
							<input type="text" name="prix" id="prix" class="span3">&nbsp;<strong>DH</strong>
						</div>
						<div class="control-group">
							<label class="right-label-large" for="image">Image 1<sup style="color:red">**</sup>&nbsp;</label>
							<input id="fileInput" class="input-file" type="file" name="image_upload1" id="image" /><br />
							<label class="right-label-large" for="image">Image 2<sup style="color:red">**</sup>&nbsp;&nbsp;</label>
							<input id="fileInput" class="input-file" type="file" name="image_upload2" id="image" /><br />
							<label class="right-label-large" for="image">Image 3<sup style="color:red">**</sup>&nbsp;&nbsp;</label>
							<input id="fileInput" class="input-file" type="file" name="image_upload3" id="image" /><br />
						</div>
						<!-- email and password if session not set :: begin -->
						<?php
						if(!isset($_SESSION['utilisateur'])){
						?>	
						<div class="control-group">
							<label class="right-label-large" for="email">Email <sup style="color:red">*</sup></label>
							<input name="email" type="text" id="inputEmail" placeholder="toto@email.com" class="span3">
						</div>
						<div class="control-group">
							<label class="right-label-large" for="password">Mot de passe <sup style="color:red">*</sup></label>
							<input name="password" type="password" id="password" placeholder="****" class="span3">
						</div>
						<div class="control-group">
							<label class="right-label-large" for="telephone">Téléphone <sup style="color:red">*</sup></label>
							<input name="telephone" type="text" class="span3">
						</div>
						<?php
						}
						?>
						<!-- email and password if session not set :: end -->
						<div class="control-group">
							<label class="right-label-large"></label>
							<input class="btn btn-large btn-success" type="submit" value="Déposer ***" />
						</div>		
						
						<label style="color:red;">*&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Champs obligatoires.</label>
						<label style="color:red;">**&nbsp;&nbsp;&nbsp;:&nbsp;Les images doivent être réelles.</label>
						<label style="color:red;">***&nbsp;&nbsp;:&nbsp;Si vous n'avez pas de compte, un sera créé.</label>
					</form>
					<a href=""></a>
				</div>
				</div>
			</div>
		</div>
    </div>
</div>
<?php
	include_once('../include/meta_footer.php');
?>