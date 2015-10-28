<!-- latest products begin -->
<?php
//testing php db features
	// include_once 'includes/db_connexion.php';
	// $db = new PDO('mysql:host=localhost;dbname=sodblodbmodb', 'root', '');
	// $annoncesManager = new AnnonceManager($db);
	// $page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
	// $limit = 10;
	// $start = ($page * $limit) - $limit;
	// $count = $annoncesManager->getCount();
	// if( $count > ($page * $limit) ){
		// $next = ++$page;
	// }
include("config.php");
$results = $pdo->query("SELECT COUNT(*) as t_records FROM annonce");//$mysqli->query("SELECT COUNT(*) as t_records FROM annonce");
$total_records = $results->fetch();//fetch_object();
$total_groups = ceil($total_records['t_records']/$items_per_group);
//$results->close(); 
?> 
<!--autoload jquery -->
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	var track_load = 0; //total loaded record group(s)
	var loading  = false; //to prevents multipal ajax loads
	var total_groups = <?php echo $total_groups; ?>; //total record group(s)
	
	$('#results').load("autoload_process.php", {'group_no':track_load}, function() {track_load++;}); //load first group
	
	$(window).scroll(function() { //detect page scroll
		
		if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
		{
			
			if(track_load <= total_groups && loading==false) //there's more data to load
			{
				loading = true; //prevent further ajax loading
				$('.animation_image').show(); //show loading image
				
				//load data from the server using a HTTP POST request
				$.post('autoload_process.php',{'group_no': track_load}, function(data){
									
					$("#results").append(data); //append received data into the element

					//hide loading image
					$('.animation_image').hide(); //hide loading image once data is received
					
					track_load++; //loaded group increment
					loading = false; 
				
				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
					
					alert(thrownError); //alert with HTTP error
					$('.animation_image').hide(); //hide loading image
					loading = false;
				
				});
				
			}
		}
	});
});
</script>

<!--autoload jquery -->
<h4>Dernières annonces </h4>
<div class="wrap">

	  <!--ul id="results" class="thumbnails"-->
	  <ul id="results" class="thumbnails">
</ul>
	    <!--<?php //foreach($annoncesManager->getAnnoncesByLimit($start, $limit) as $annonce){?>
		<div class="item">
		<li  class="span3" >
		  <div class="thumbnail">
			<a  href="../controller/DetailAnnonceController.php?id=<?php //echo $annonce->id();?>"><img style="width:160px;height:160px;" src="<?php //echo $annonce->image();?>" alt=""></a>
			<div class="caption">
				<h5><?php //echo ucfirst($annonce->titre());?></h5>
				<p> 
					<?php 
						//$datePublication = new DateTime($annonce->datePublication());
						//echo "Publié le : ".$datePublication->format('d-M-Y');
					?>
				</p>
				<h4 style="text-align:center">
					<a class="btn" href="../controller/DetailAnnonceController.php?id=<?php //echo $annonce->id();?>"><i class="icon-zoom-in"></i></a>
					<a class="btn btn-primary" href="#"><?php //echo $annonce->prix();?> DH</a>
				</h4>
			</div>
		  </div>
		</li>
		</div>
		<?php //}
		?>-->
	  <!--/ul-->
	  <div class="animation_image" style="display:none" align="center"><img src="themes/img/ajax-loader.gif"></div>
	  <!--page navigation-->
	<?php //if (isset($next)): ?>
	<!--div class="nav">
		<a href="index.php?p=<?php //echo $next?>">Next</a>
	</div-->
	<?php //endif?>
</div>
<!-- latest products end -->