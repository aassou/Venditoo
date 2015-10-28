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
?>
<div id="mainBody">
		<div class="container">
			<div class="row">
				<?php
					include_once('../include/meta_sidebar.php');
				?>
				<div class="span9">	
					<?php
						$db = $pdo;
						$annoncesManager = new AnnonceManager($db);
					?>
					<ul class="breadcrumb">
						<li class="active">Mes Annonces<span class="divider">/</span></li></li>
						<li><a href="myprofil.php">Mon compte</a>
					</ul>
					<h4>Mes annonces</h4>
					<?php if (isset($_SESSION['addinfo'])){?>
					<div class="alert alert-success">
						<p style="font-size:14px;"><?php echo $_SESSION['addinfo']?></p>
					</div>
					<?php unset($_SESSION['addinfo']); } ?>
					<ul class="thumbnails">
						<?php foreach($annoncesManager->getAnnonceByUserId($_SESSION['utilisateur']->id()) as $annonce){
									$deletePath = "../controller/DeleteAnnonceController.php?id=".$annonce->id();
									$updatePath = "../controller/UpdateAnnonceController.php?id=".$annonce->id();
						?>
						<li class="span3">
							<div class="thumbnail">
								<a  href="../controller/DetailAnnonceController.php?id=<?php echo $annonce->id();?>"><img style="width:160px;height:160px;" src="<?php echo $annonce->image();?>" alt=""></a>
								<div class="caption">
									<h5><?php echo $annonce->titre();?></h5>
									<p><?php echo $annonce->description(); $idAnnonce = $annonce->id();?></p>
									<h4 style="text-align:center"><a class="btn" href="../controller/DetailAnnonceController.php?id=<?php echo $idAnnonce;?>"><i class="icon-zoom-in"></i></a>
									<a class="btn btn-primary" href="#"><?php echo $annonce->prix().'DH';?></a></h4>
									<a href="#update<?php echo $annonce->id();?>" role="button" data-toggle="modal" data-id="<?php echo $annonce->id(); ?>" class="btn btn-warning">Modifier<!--&nbsp;<i class="icon-white icon-refresh"></i--></a>
									<a href="#delete<?php echo $annonce->id();?>" role="button" data-toggle="modal" data-id="<?php echo $annonce->id(); ?>" class="btn btn-danger">Supprimer<!--&nbsp;<i class="icon-white icon-remove"></i--></a>
									<a href="../controller/SelledController.php?id=<?php echo $annonce->id();?>" class="btn btn-success">Vendu<!--&nbsp;<i class="icon-white icon-remove"></i--></a>
									<!-- delete box begin-->
									<div id="delete<?php echo $annonce->id();?>" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h3>Supprimez l'annonce</h3>
										</div>
										<div class="modal-body">
											<form class="form-horizontal loginFrm" action="<?php echo $deletePath;?>" method="post">
												<p>Êtes-vous sûr de vouloir supprimer cette annonce ?</p>
												<div class="control-group">
													<label class="right-label"></label>
													<button type="submit" class="btn btn-success" aria-hidden="true">Oui</button>
													<button class="btn" data-dismiss="modal"aria-hidden="true">Non</button>
												</div>
											</form>
										</div>
									</div>
									<!-- delete box end -->
									<!-- update box end -->
									<div id="update<?php echo $annonce->id();?>" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h3>Modifiez l'annonce</h3>
										</div>
										<div class="modal-body">
											<form class="form-horizontal loginFrm" action="<?php echo $updatePath; ?>" method="post" enctype="multipart/form-data">
												<div class="control-group">								
													<label class="right-label">Catégorie</label>
													<select name="srchCat" class="srchTxt">
														<?php
															$db = $pdo;
															$categorieManager = new CategorieManager($db);
															$listCategorieNames = $categorieManager->getCategorieNames();
															foreach($listCategorieNames as $categorieNames){
															$listCategorieDetails = $categorieManager->getCategorieDetails($categorieNames->nom());
														?>
														<option style="background-color:#f0f0f0;"><?php echo '-------- '.strtoupper($categorieNames->nom()).' --------'; ?></option>
														<?php		
															foreach($listCategorieDetails as $categorieDetails){
														?>
														<option value="<?php echo $categorieDetails->id(); ?>"><?php echo ucfirst($categorieDetails->detail());?></option>
														<?php
															}
															}
														?>
													</select>
												</div>
												<div class="control-group">
													<label class="right-label">Ville</label>
													<select name="srchVille" class="srchTxt">
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
												<div class="control-group">
													<label class="right-label">Titre</label>
													<input name="titre" type="text" class="span3" value="<?php echo $annonce->titre();?>" />
												</div>
												<div class="control-group">
													<label class="right-label">Description</label>
													<textarea name="description" class="span3"><?php echo $annonce->description();?></textarea>
												</div>
												<div class="control-group">
													<label class="right-label">Prix</label>
													<input name="prix" type="text" class="span3" value="<?php echo $annonce->prix();?>" />DH
												</div>
												<div class="control-group">
													<label class="control-label" for="image">Image 1<sup>*</sup></label>
													<div class="controls">
														<input class="input-file" type="file" name="image_upload1" /><br />
													</div>
													<label class="control-label" for="image">Image 2</label>
													<div class="controls">
														<input class="input-file" type="file" name="image_upload2" /><br />
													</div>
													<label class="control-label" for="image">Image 3</label>
													<div class="controls">
														<input class="input-file" type="file" name="image_upload3" /><br />
													</div>
												</div>
												<div class="control-group">
													<label class="right-label"></label>
													<button type="submit" class="btn btn-success" aria-hidden="true">Modifier</button>
													<button class="btn" data-dismiss="modal"aria-hidden="true">Annuler</button>
												</div>
											</form>
										</div>
									</div>
									<!-- update box end -->
								</div>
							</div>
						</li>
						<?php 
							
							$_SESSION['image1_'.$annonce->id()] = $annonce->image();
							$_SESSION['image2_'.$annonce->id()] = $annonce->image2();
							$_SESSION['image3_'.$annonce->id()] = $annonce->image3();
						}?>
					 </ul>
				</div>
			</div>
		</div>
	</div>
<?php
	include_once('../include/meta_footer.php');
	}

	else{
		header('Location:index.php');
	}
?>