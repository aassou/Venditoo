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
$var = "".$_SESSION['annonce']->id()."";
if(!isset($_SESSION["$var"]['likeClick'])){$_SESSION["$var"]['likeClick']=0;}
	$likeLink = "";
	$likeAlt = "Vous devez être connecté !";
	if(isset($_SESSION['utilisateur'])){
		include_once('../include/meta_header_loged.php');
		$likeLink = 'href="../controller/LikeController.php"';
		$likeAlt="J'aime";
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
				<!--product details begin -->
				<ul class="breadcrumb">
					<li><a href="index.php">Accueil</a><span class="divider">/</span></li>
					<li><a href="cont_annonces.php">Annonces</a> <span class="divider">/</span></li>
					<li class="active">Détails annonce</li>
				</ul>	
				<div class="row">	  
					<div id="gallery" class="span3">
						<?php if (isset($_SESSION['annonce'])){ ?>
						<div id="differentview" class="moreOptopm carousel slide">
							<div class="carousel-inner">
								<div class="item active">
								   <a href="<?php echo $_SESSION['annonce']->image();?>"> <img style="width:250px;" src="<?php echo $_SESSION['annonce']->image();?>" alt=""/></a>
								</div>
								<div class="item active">
								   <a href="<?php echo $_SESSION['annonce']->image2();?>"> <img style="width:100px; height:50px;" src="<?php echo $_SESSION['annonce']->image2();?>" alt=""/></a>
								   <a href="<?php echo $_SESSION['annonce']->image3();?>"> <img style="width:100px; height:50px;" src="<?php echo $_SESSION['annonce']->image3();?>" alt=""/></a>
								   
								</div>
								
							</div>
						</div>
					</div>		  
					<div class="control-label">
						<label class="span1"></label>
						<div class="btn-group">
							<a class="btn" <?php echo $likeLink; ?> title="<?php echo $likeAlt;?>"><i class=" icon-thumbs-up"></i></a>
						</div>
						
						<div class="btn-group">
							<a class="btn" href="../controller/AbuseController.php" title="Signaler un abus"><i class="icon-ban-circle"></i></a>
						</div>
					</div>
					<div class="span6">
						<h3><?php echo ucfirst($_SESSION['annonce']->titre());?></h3>
						<label class="control-label">
								<?php
									echo '<span class="btn btn-info"><strong>Prix : '.$_SESSION['annonce']->prix().'&nbsp;DH</strong></span>';
									$datePublication = new DateTime($_SESSION['annonce']->datePublication());
									echo '&nbsp;<span class="btn btn-error"><strong>Publié le : </strong>'.$datePublication->format('d-M-Y').'</span>';
									if($_SESSION['advertiser']->nom()!='vide'){echo '&nbsp;<span class="btn btn-success">Par&nbsp;:&nbsp;'.$_SESSION['advertiser']->nom().'</span>';}
									if($_SESSION['annonce']->vendu()=="non"){
if($_SESSION['advertiser']->telefon()!='vide'){echo '&nbsp;<span class="btn btn-inverse">Tél&nbsp;:&nbsp;<strong>'.$_SESSION['advertiser']->telefon().'</strong></span>';}
else{
	echo '&nbsp;<span class="btn btn-inverse">Email&nbsp;:&nbsp;<strong>'.$_SESSION['advertiser']->email().'</strong></span>';
}
}
							?>
						</label>
						<div class="alert alert-success">
							<strong style="color:gray; text-decoration:underline;">Détails de l'annonce :</strong>
							<p style="color:black;"><?php echo ucfirst($_SESSION['annonce']->description()); ?></p>
						</div>
						
						<!--a href="#" name="detail"></a>
						<hr class="soft"/-->
						<!--div class="control-group"-->
							<label class="control-label">
							<?php if($_SESSION['annonce']->vendu()=="oui"){ 
									echo '<span class="btn btn-danger"><strong>Vendu</strong></span>';
								}
								else{
									echo '<span class="btn btn-success"><strong>Disponible</strong></span>';
								} 
							?>
							</label>
						<!--/div-->
					</div>
					
					<?php }?>
					<div class="span9">
						<ul id="productDetail" class="nav nav-tabs">
							<!--li><a href="#home" data-toggle="tab">Détails produit</a></li-->
							<li class="active"><a href="#profile" data-toggle="tab"><strong style="color:black;">Annonces similaires</strong></a></li>
						</ul>
						<div id="myTabContent" class="tab-content" style="background-color:#e6e6e6;">
							<div class="tab-pane fade active in" id="profile">
								<div id="myTab" class="pull-right"></div>
								<br class="clr"/>
								<div class="tab-content">
									<div class="tab-pane active" id="listView">
										<div class="row span8">	  
											<ul class="thumbnails">
								<?php
									if(isset($_SESSION['annoncesim'])){
											// $ans = array();
											// $ans = $_SESSION['annoncesim'];
											foreach($_SESSION['annoncesim'] as $an){
								?>
								
								<li class="span2">
								
								<div class="thumbnail">
									<a href="../controller/DetailAnnonceController.php?id=<?php echo $an->id();?>"><img style="width:160px;height:160px;" src="<?php echo $an->image()?>" alt=""/></a>
									<div class="caption">
									  <h5><?php echo ucfirst($an->titre());?></h5>
									  <p> 
										<?php 
											$datePublication = new DateTime($an->datePublication());
											//echo 'Publié le : '.$datePublication->format('d-M-Y');
										?>
									  </p>
									   <h4 style="text-align:center">
											<!--a class="btn" href="../controller/DetailAnnonceController.php?id=<?php echo $an->id();?>"><i class="icon-zoom-in"></i></a-->
											<!--a class="btn btn-primary" href="#"><?php //echo $an->prix();?> DH</a-->
										</h4>
									</div>
								  </div>
								</li>
								
								<?php
										}//foreach end
									}//first if end
									elseif(empty($_SESSION['annoncesim'])){
										echo "<h2>Cette catégorie n'existe pas encore !</h2>";
									}
								?>
							</ul>
										</div>
									</div>
								</div>
								<br class="clr">
							</div>
						</div>
					</div>
			</div>
		</div>
	</div> 
</div>
				<!-- product details end -->
			</div>
		</div>
	</div>
</div>
<?php
		include_once('../include/meta_footer.php');
?>