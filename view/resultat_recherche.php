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
	if(isset($_SESSION['utilisateur'])){include_once('../include/meta_header_loged.php');}
	else{include_once('../include/meta_header.php');}
?>
<div id="mainBody">
	<div class="container">
		<div class="row">
			<?php include_once('../include/meta_sidebar.php'); ?>
			<div class="span9">	
				<ul class="breadcrumb">
					<li><a href="index.php">Accueil</a><span class="divider">/</span></li>
					<li class="active">Annonces</li>
				</ul>
				<h3>Résultat de recherche</h3>
				<!--div id="myTab" class="pull-right"-->
					<!--a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a-->
					<!--a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
				</div-->
				<br class="clr"/>
				<div class="tab-content">
					<div class="tab-pane  active" id="blockView">
						<ul class="thumbnails">
							<?php
								if(isset($_SESSION['resultat_recherche'])){
										// $ans = array();
										// $ans = $_SESSION['annonce'];
										
										foreach($_SESSION['resultat_recherche'] as $an){
							?>
							<li class="span3">
							  <div class="thumbnail" style="background-color:#f5f5f5">
								<a href="../controller/DetailAnnonceController.php?id=<?php echo $an->id();?>"><img  style="width:100px;height:100px;" src="<?php echo $an->image()?>" alt=""/></a>
								<div class="caption">
								  <h5><?php echo ucfirst($an->titre()); $date = new DateTime($an->datePublication()); ?></h5><p>Publié le : <?php echo $date->format('d-M-Y'); ?></p>
								   <h4 style="text-align:center"><a class="btn" href="../controller/DetailAnnonceController.php?id=<?php echo $an->id();?>"> <i class="icon-zoom-in"></i></a><a class="btn btn-primary"><?php echo $an->prix();?> DH</a></h4>
								</div>
							  </div>
							</li>
							<?php
									}//foreach end
								}//first if end
								else{
									echo "<h4>Ce que vous cherchez n'est pas encore ici !</h4>";
								}
							?>
						</ul>
					</div>
				</div>
				<br class="clr"/>
			</div>
		</div>
	</div>
</div>
<?php
		include_once('../include/meta_footer.php');
?>