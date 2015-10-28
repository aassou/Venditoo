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
					<ul class="breadcrumb">
						<li><a href="index.php">Accueil</a><span class="divider">/</span></li>
						<li><a href="cont_annonces.php">Annonces</a> <span class="divider">/</span></li>
					</ul>	
					<span class="breadcrumb span2">
						<a href="../controller/CategorieAnnonceController.php?cat=technologie" style="text-align:center">
							<img style="width:150px;height:150px;" src="themes/img/ipad.png" alt="Technologies" />	
							<p style="text-align:center; font-weight:bold">Technologies</p>
						</a>
					</span>
					<span class="breadcrumb span2">
						<a href="../controller/CategorieAnnonceController.php?cat=automoto">
							<img style="width:150px;height:150px;" src="themes/img/car.png" alt="AutoMoto" />
							<p style="text-align:center; font-weight:bold">AutoMoto</p>
						</a>
					</span>
					
					<span class="breadcrumb span2">
						<a href="../controller/CategorieAnnonceController.php?cat=immobilier">
							<img style="width:150px;height:150px;" src="themes/img/apartment.png" alt="Immobilier" />
							<p style="text-align:center; font-weight:bold">Immobilier</p>
						</a>
						
					</span>
					<span class="breadcrumb span2">
						<a href="../controller/CategorieAnnonceController.php?cat=vetement">
							<img style="width:150px;height:150px;" src="themes/img/shirt.png" alt="Vêtements" />
							<p style="text-align:center; font-weight:bold">Vêtements</p>
						</a>
					</span>
					<span class="breadcrumb span2">
						<a href="../controller/CategorieAnnonceController.php?cat=maisonjardins">
							<img style="width:150px;height:150px;" src="themes/img/washing-machine.png" alt="emploi" />
							<p style="text-align:center; font-weight:bold">Accessoires de maisons</p>
						</a>
					</span>
					
					<span class="breadcrumb span2">
						<a href="../controller/CategorieAnnonceController.php?cat=emploiservice">
							<img style="width:150px;height:150px;" src="themes/img/employment.png" alt="emploi" />
							<p style="text-align:center; font-weight:bold">Emploi et services</p>
						</a>
					</span>
					<?php
						//include_once('meta_featured_products.php');
						//include_once('meta_latest_products.php');
						
					?>
				</div>
			</div>
		</div>
	</div>
<?php
		include_once('../include/meta_footer.php');
?>