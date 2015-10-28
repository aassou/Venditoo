<!-- latest products begin -->
<?php
//testing php db features
	include_once 'includes/db_connexion.php';
	$db = new PDO('mysql:host=localhost;dbname=sodblodbmodb', 'root', '');
	$annoncesManager = new AnnonceManager($db);
	
?>
<h4>Dernières annonces </h4>
	  <ul class="thumbnails">
	    <?php foreach($annoncesManager->getAnnonces() as $annonce){?>
		<li class="span3">
		  <div class="thumbnail">
			<a  href="../controller/DetailAnnonceController.php?id=<?php echo $annonce->id();?>"><img style="width:160px;height:160px;" src="<?php echo $annonce->image();?>" alt=""></a>
			<div class="caption">
				<h5><?php echo ucfirst($annonce->titre());?></h5>
				<p> 
					<?php 
						$datePublication = new DateTime($annonce->datePublication());
						echo "Publié le : ".$datePublication->format('d-M-Y');
					?>
				</p>
				<h4 style="text-align:center">
					<a class="btn" href="../controller/DetailAnnonceController.php?id=<?php echo $annonce->id();?>"><i class="icon-zoom-in"></i></a>
					<a class="btn btn-primary" href="#"><?php echo $annonce->prix();?> DH</a>
				</h4>
			</div>
		  </div>
		</li>
		<?php }?>
	  </ul>
<!-- latest products end -->