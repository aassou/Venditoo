<?php
include("config.php"); //include config file
include("../model/AnnonceManager.class.php");
include("../model/Annonce.class.php");
if($_POST)
{
	//sanitize post value
	$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	
	//throw HTTP error if group number is not valid
	if(!is_numeric($group_number)){
		header('HTTP/1.1 500 Invalid number!');
		exit();
	}
	
	//get current starting point of records
	$position = ($group_number * $items_per_group);
	
	//Limit our results within a specified range. 
	$results = $pdo->query("SELECT * FROM annonce ORDER BY id ASC LIMIT $position, $items_per_group");
	$annoncesManager = new AnnonceManager($pdo);
	$annonces = $annoncesManager->getAnnoncesByLimit($position, $items_per_group);
	//$mysqli->query("SELECT id,titre,prix FROM annonce ORDER BY id ASC LIMIT $position, $items_per_group");
	
	if ($results) { 
		//output results from database
		
	    foreach($annonces as $annonce){?>
		<li class="span3">
		  <div class="thumbnail" style="background-color:#f5f5f5">
			<a  href="../controller/DetailAnnonceController.php?id=<?php echo $annonce->id();?>"><img style="width:100px;height:100px;" src="<?php echo $annonce->image();?>" alt=""></a>
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
					<a class="btn btn-primary"><?php echo $annonce->prix();?> DH</a>
				</h4>
			</div>
		  </div>
		</li>
		<?php }
	
	}
	unset($obj);
	//$mysqli->close();
}
?>