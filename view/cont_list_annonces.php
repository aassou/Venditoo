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
		include_once('../include/meta_header_loged.php');
	}
	else{
		include_once('../include/meta_header.php');
	}
?>
<div id="mainBody">
	<div class="container">
		<div class="row">
			<?php include_once('../include/meta_sidebar.php'); ?>
			<div class="span9">	
				<ul class="breadcrumb">
					<li><a href="index.php">Accueil</a><span class="divider">/</span></li>
					<li><a href="cont_annonces.php">Annonces</a></li>
				</ul>
				<h3>Liste des annonces<!--small class="pull-right"> 40 products are available </small--></h3>	
				<br class="clr"/>
				<div>
					<div>
						<ul class="thumbnails">
							<?php
								if(!empty($_SESSION['annonce_categorie'])){
									foreach($_SESSION['annonce_categorie'] as $an){
							?>
							<li class="span3">
							  <div class="thumbnail" style="background-color:#f5f5f5">
								<a href="../controller/DetailAnnonceController.php?id=<?php echo $an->id();?>"><img style="width:100px;height:100px;" src="<?php echo $an->image()?>" alt=""/></a>
								<div class="caption">
									<h5><?php echo ucfirst($an->titre());?></h5>
									<p> 
									<?php 
										$datePublication = new DateTime($an->datePublication());
										echo "Publié le : ".$datePublication->format('d-M-Y');
									?>
									</p>
									<h4 style="text-align:center">
										<a class="btn" href="../controller/DetailAnnonceController.php?id=<?php echo $an->id();?>"><i class="icon-zoom-in"></i></a>
										<a class="btn btn-primary"><?php echo $an->prix();?> DH</a>
									</h4>
								</div>
							  </div>
							</li>
							<?php
									}//foreach end
								}//first if end
								else{
							?>
								<div style="margin-left:50px;">
									<h4>Cette catégorie ne contient aucune annonce !</h4>
									<h5>Vous pouvez cherché dans d'autres catégories : </h5>
								</div>
								<div style="margin: 50px;">
									<span class="breadcrumb span2">
										<a href="../controller/CategorieAnnonceController.php?cat=technologie" style="text-align:center">
											<img style="width:150px;height:150px;" src="../view/themes/img/ipad.png" alt="Technologies" />	
											<p style="text-align:center; font-weight:bold">Technologies</p>
										</a>
									</span>
									<span class="breadcrumb span2">
										<a href="../controller/CategorieAnnonceController.php?cat=automoto">
											<img style="width:150px;height:150px;" src="../view/themes/img/car.png" alt="AutoMoto" />
											<p style="text-align:center; font-weight:bold">AutoMoto</p>
										</a>
									</span>
									
									<span class="breadcrumb span2">
										<a href="../controller/CategorieAnnonceController.php?cat=immobilier">
											<img style="width:150px;height:150px;" src="../view/themes/img/apartment.png" alt="Immobilier" />
											<p style="text-align:center; font-weight:bold">Immobilier</p>
										</a>
										
									</span>
									<span class="breadcrumb span2">
										<a href="../controller/CategorieAnnonceController.php?cat=vetement">
											<img style="width:150px;height:150px;" src="../view/themes/img/shirt.png" alt="Vêtements" />
											<p style="text-align:center; font-weight:bold">Vêtements</p>
										</a>
									</span>
									<span class="breadcrumb span2">
										<a href="../controller/CategorieAnnonceController.php?cat=maisonjardins">
											<img style="width:150px;height:150px;" src="../view/themes/img/washing-machine.png" alt="emploi" />
											<p style="text-align:center; font-weight:bold">Accessoires de maisons</p>
										</a>
									</span>
									
									<span class="breadcrumb span2">
										<a href="../controller/CategorieAnnonceController.php?cat=emploiservice">
											<img style="width:150px;height:150px;" src="../view/themes/img/employment.png" alt="emploi" />
											<p style="text-align:center; font-weight:bold">Emploi et services</p>
										</a>
									</span>
								</div>
							<?php	}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
		include_once('../include/meta_footer.php');
?>