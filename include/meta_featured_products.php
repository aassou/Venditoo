<!-- featured products begin -->
<?php
include_once ('config.php');
	$db = $pdo;
	$annoncesManager = new AnnonceManager($db);
	$arrayElements = $annoncesManager->getCount();
	
?>
<div class="well well-small">
	<h4>Top annonces</h4>
	<div class="row-fluid">
		<div id="featured" class="carousel slide">
			<div class="carousel-inner">
				<?php
					/*
					in this carousel div we've encountered a problem of display
					you must know that the <ul> list in this section can 
					take just 4 <li> element, and after this we should open
					another <ul> and on and on.....
					*/
					//begin : php code resolve the problem of featured products
					$listCounter = 4; //used to know where we go to place div & ul
					$className = ''; //used for class="item active" or class="item"
					foreach($annoncesManager->getMostViewed() as $annonce){
					
					if($listCounter==4){
						//it's used for the first div
						$className='item active';
					}
					else{
						//it's used for the others div
						$className='item';
					}
					if($listCounter%4==0){
				?>
				<div class="<?php echo $className; ?>">
					<ul class="thumbnails">
					<?php 
					} 
					?>
						<li class="span3">
							<div class="thumbnail">
								<?php
									//this code help us to know which ads is new
									//and to add the new picture in front of it.
									$date = date('Y-m-d');
									if($date==$annonce->datePublication()){
								?>
								<i class="tag"></i>
								<?php 
									}
								?>
								<a href="../controller/DetailAnnonceController.php?id=<?php echo $annonce->id();?>" ><img style="width:100px;height:100px;" src="<?php echo $annonce->image();?>" alt=""></a>
								<!--div class="caption"-->
									<h5><?php echo ucfirst($annonce->titre());?></h5>
									<p><a class="btn" href="../controller/DetailAnnonceController.php?id=<?php echo $annonce->id();?>" ><i class="icon-zoom-in"></i></a>
										<span class="btn btn-success"><strong><?php echo $annonce->prix();?> Dh</strong></span></p>
							<!--/div-->
							</div>
						</li>
					<?php $listCounter++;
					
					if($listCounter%4==0 && $listCounter!=4) {
					?>
					</ul>
				</div>
				<?php
				}
				
				}
				?></ul>
				</div>
			</div>
			<a class="left carousel-control" href="#featured" data-slide="prev">&lsaquo;</a>
			<a class="right carousel-control" href="#featured" data-slide="next">&rsaquo;</a>
		</div>
	</div>
</div>
<!-- featured products end -->