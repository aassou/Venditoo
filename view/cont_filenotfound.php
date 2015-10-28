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
				<?php
					include_once('../include/meta_sidebar.php');
				?>
				<div class="span9">	
					<h3>Erreur, cette page n'existe pas !!!!</h3>
				</div>
			</div>
		</div>
	</div>
<?php
		include_once('../include/meta_footer.php');
?>