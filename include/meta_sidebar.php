<?php
	//subMenu activation process
	$techArray = array('technologie', 'Informatique', 'Téléphone', 'AudioVideo', 'Jeux');
	$veteArray = array('vetement', 'Vetement-Homme','Vetement-Femme', 'Vetement-Enfant', 'Chaussure-Homme',
				'Chaussure-Femme','Chaussure-Enfant', 'Montre-Lunnettes', 'Bijoux-Accessoire');
	$immoArray = array('immobilier', 'MaisonJardins', 'Maison', 'Appartement', 'Villa', 'Terrain',
				'Colocation', 'Boutique', 'Location-Vacance');
	//maijArray : maison et jardins array
	$maijArray = array('MaisonJardins', 'ElectroMenager', 'Meuble-Interieur', 'Accessoires');
	$santArray = array('SanteBeaute', 'Parfum', 'Cosmetic', 'Paramedical');
	$autoArray = array('automoto', 'Voiture', 'Moto', 'Vehicule-Pro', 'Pieces', 'Bateaux');
	$jobsArray = array('emploiservice', 'Offres-Emploi', 'Demandes-Emploi', 'Services','Cours', 'Materiel-Pro', 'Bricolage');
	$categorieName="";
	if(isset($_GET['categorie'])){
		$categorieName = $_GET['categorie'];
	}
?>
<!-- Sidebar ================================================== -->

<div id="sidebar" class="span3">
	<ul id="sideManu" class="nav nav-tabs nav-stacked">
		<li><a href="index.php">Accueil</a></li>
		<li class="subMenu<?php if(in_array($categorieName, $techArray)){echo " open";}?>"><a>Technologies</a>
			<ul <?php if(!in_array($categorieName, $techArray)){ echo 'style="display:none"';}?> >
				<li><a class="active"  href="../controller/CategorieAnnonceController.php?cat=Informatique"><i class="icon-chevron-right"></i>PC, Ordinateurs et Tablettes</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Téléphone"><i class="icon-chevron-right"></i>Téléphones mobiles et Smartphone</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=AudioVideo"><i class="icon-chevron-right"></i>TV et Audio</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Jeux"><i class="icon-chevron-right"></i>Jeux et consoles</a></li>
			</ul>
		</li>
		<li class="subMenu<?php if(in_array($categorieName, $veteArray)){echo " open";}?>"><a> Vêtements </a>
			<ul <?php if(!in_array($categorieName, $veteArray)){ echo 'style="display:none"';}?> >
				<li><a href="../controller/CategorieAnnonceController.php?cat=Vetement-Femme"><i class="icon-chevron-right"></i>Vêtemets des femmes</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Chaussure-Femme"><i class="icon-chevron-right"></i>Chaussures des femmes</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Bijoux-Accessoire"><i class="icon-chevron-right"></i>Bijoux et accessoires</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Vetement-Enfant"><i class="icon-chevron-right"></i>Vêtements des enfants</a></li>	
				<li><a href="../controller/CategorieAnnonceController.php?cat=Chaussure-Enfant"><i class="icon-chevron-right"></i>Chaussures des enfants</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Vetement-Homme"><i class="icon-chevron-right"></i>Vêtements des hommes</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Chaussure-Homme"><i class="icon-chevron-right"></i>Chaussures des hommes</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Montre-Lunnettes"><i class="icon-chevron-right"></i>Montres et lunettes</a></li>
			</ul>
		</li>
		<li class="subMenu<?php if(in_array($categorieName, $immoArray)){echo " open";}?>"><a>Immobilier</a>
			<ul <?php if(!in_array($categorieName, $immoArray)){ echo 'style="display:none"';}?> >
				<li><a href="../controller/CategorieAnnonceController.php?cat=Appartement"><i class="icon-chevron-right"></i>Appartements</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Maison"><i class="icon-chevron-right"></i>Maisons</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Villa"><i class="icon-chevron-right"></i>Villas</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Terrain"><i class="icon-chevron-right"></i>Terrains</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Colocation"><i class="icon-chevron-right"></i>Colocation</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Location-Vacance"><i class="icon-chevron-right"></i>Location pour vacances</a></li>					
			</ul>
		</li>
		<li class="subMenu<?php if(in_array($categorieName, $maijArray)){echo " open";}?>"><a>Maisons et jardins</a>
			<ul <?php if(!in_array($categorieName, $maijArray)){ echo 'style="display:none"';}?> >
				<li><a href="../controller/CategorieAnnonceController.php?cat=ElectroMenager"><i class="icon-chevron-right"></i>Electroménager</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Meuble-Interieur"><i class="icon-chevron-right"></i>Meuble et intérieure</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Accessoires"><i class="icon-chevron-right"></i>Accessoires de jardin</a></li>												
			</ul>
		</li>
		<li class="subMenu<?php if(in_array($categorieName, $santArray)){echo " open";}?>"><a>Santé et beauté</a>
			<ul <?php if(!in_array($categorieName, $santArray)){ echo 'style="display:none"';}?> >
				<li><a href="../controller/CategorieAnnonceController.php?cat=Cosmetic"><i class="icon-chevron-right"></i>Cosmétique</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Paramedical"><i class="icon-chevron-right"></i>Paramédical</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Parfum"><i class="icon-chevron-right"></i>Parfum</a></li>												
			</ul>
		</li>
		<li class="subMenu<?php if(in_array($categorieName, $autoArray)){echo " open";}?>"><a>AutoMoto</a>
			<ul <?php if(!in_array($categorieName, $autoArray)){ echo 'style="display:none"';}?> >
				<li><a href="../controller/CategorieAnnonceController.php?cat=Voiture"><i class="icon-chevron-right"></i>Voitures</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Vehicule-pro"><i class="icon-chevron-right"></i>Véhicules professionnels</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Moto"><i class="icon-chevron-right"></i>Motos</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Pieces"><i class="icon-chevron-right"></i>Pièces et accessoires</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Bateaux"><i class="icon-chevron-right"></i>Bateaux</a></li>												
			</ul>
		</li>
		<li class="subMenu<?php if(in_array($categorieName, $jobsArray)){echo " open";}?>"><a>Emploi et services</a>
			<ul <?php if(!in_array($categorieName, $jobsArray)){ echo 'style="display:none"';}?> >
				<li><a href="../controller/CategorieAnnonceController.php?cat=Offres-Emploi"><i class="icon-chevron-right"></i>Offres d'emploi</a></li>
				<li><a href="../controller/CategorieAnnonceController.php?cat=Demandes-Emploi"><i class="icon-chevron-right"></i>Demandes d'emploi</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Services"><i class="icon-chevron-right"></i>Services</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Cours"><i class="icon-chevron-right"></i>Cours et soutien</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Materiel-Pro"><i class="icon-chevron-right"></i>Matériel professionnel</a></li>												
				<li><a href="../controller/CategorieAnnonceController.php?cat=Bricolage"><i class="icon-chevron-right"></i>Bricolage</a></li>												
			</ul>
		</li>

	</ul>
	<br/>
</div>
<!-- Sidebar end=============================================== -->