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
        if(file_exists('../controller/'.$myClass.'.class.php')){
			include('../controller/'.$myClass.'.class.php');
		}
    }
    spl_autoload_register("classLoad");
//classes loading end
	session_start();
	
	if(isset($_SESSION['utilisateur'])){
		include_once('../include/meta_header_loged.php');
	}
	else{
		include_once('../include/meta_header.php');
	}
	include_once('../include/meta_carousel.php');

?>
	
	<div id="mainBody">
		<div class="container">
			<div class="row">
				<?php
					include_once('../include/meta_sidebar.php');
				?>
				<div class="span9">	
					<?php
						include_once('../include/meta_featured_products.php');
					?>
					<div class="wrap">
					<?php
						include_once('../include/meta_latest_products_ajax.php');
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		include_once('../include/meta_footer.php');
?>