<?php
/*
	Author                      : AASSOU Abdelilah.
	Creation Date               : 08/10/2013
*/
include ('../model/CategorieManager.class.php');
?>
<!DOCTYPE html>
<html>
	<!--meta header begin -->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>VenditOO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="author" content="" />
	<!--Less styles -->
	   <!-- Other Less css file //different less files has different color scheam
		<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
		<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
		<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
		-->
		<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
		<script src="themes/js/less.js" type="text/javascript"></script> -->
		
	<!-- Bootstrap style --> 
		<link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
		<link href="themes/css/base.css" rel="stylesheet" media="screen"/>
	<!-- Bootstrap style responsive -->	
		<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
		<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<!-- Google-code-prettify -->	
		<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
	<!-- fav and touch icons -->
		<link rel="shortcut icon" href="themes/images/ico/icon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
		<style type="text/css" id="enject"></style>
		<script>
			function changeBackground(color) {
				document.body.style.background = color;
			}
		</script>
		<!--ajax scrolling page begin------------------------------------------------------>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="themes/js/jquery-ias.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				// Infinite Ajax Scroll configuration
				jQuery.ias({
					container : '.wrap', // main container where data goes to append
					item: '.item', // single items
					pagination: '.nav', // page navigation
					next: '.nav a', // next page selector
					loader: '<img src="themes/js/ajax-loader.gif"/>', // loading gif
					triggerPageThreshold: 3 // show load more if scroll more than this
				});
			});
		</script>
		<!--ajax scrolling page end------------------------------------------------------->
		
	</head>
	<!--meta header end -->
	<body>
		<!-- Navbar begin ================================================== -->
		<div id="header">
			<div class="container">
				<div id="welcomeLine" class="row">
					<div class="span6">
						<div class="pull-right">
							<!--a href="../ar/index.php"><span class="btn btn-mini">العربية</span>&nbsp;<img src="themes/images/ico/marocd.png" /></a-->
							<!--a href="/index.php"><span class="btn btn-mini">Français</span>&nbsp;<img src="themes/images/ico/franced.png" /></a-->
						</div>
					</div>
					<a href="addads.php" style="float:right;">
						<span class="btn btn-warning btn-large" ><strong>Vos annonces <em><span style="">Gratuites</span> en <span style="">2 minutes </span></em></strong></span>
					</a>
				</div>
				<div id="logoArea" class="navbar">
					<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div class="navbar-inner">
						<a class="brand" href="index.php"><img src="themes/images/logo-new.png" alt="VenditOO"/></a>
						<form class="form-inline navbar-search" method="post" action="../controller/SearchController.php" >
							<input name="recherche" class="srchTxt" type="text" placeholder="Commencez la recherche" style="width:350px;"/>

<?php //include('../include/categorie_list.php'); ?>
<select name="srchVille" class="srchTxt" style="width:160px;">
<?php include('../include/ville.html'); ?>
</select>
							<button type="submit" id="submitButton" class="btn btn-info btn-mini"><img src="themes/images/search.png" /></button>
						</form>
						<!-- connection modul begin  -->
						<ul id="topMenu" class="nav pull-right">
							<!--li><a href="#">Tests</a></li>
							<li class="divider-vertical"></li-->
							<!--li class=""><a href="special_offer.html">Specials Offer</a></li-->
							<!--li class=""><a href="normal.html">Delivery</a></li-->
							<!--li class=""><a href="contact.html">Contact</a></li-->
							<li class="">
								<!--a href="cont_login.php" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Connexion</span></a-->
								<a href="#login" role="button" data-toggle="modal"  style="display:inline-block"><span class="btn btn-success btn-large">Connexion</span></a>
								<a href="cont_inscription.php" style="display:inline-block"><span class="btn btn-info btn-large">Inscription</span></a>
								<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3>Espace de connexion</h3>
									</div>
									<div class="modal-body">
										<form class="form-horizontal loginFrm" action="../controller/ConnexionController.php" method="post">
											<div>								
												<label class="right-label">Email</label><input name="email" type="text" class="span3" id="inputEmail" placeholder="Email">
											</div>
											<div>
												<label class="right-label">Mot de passe</label><input name="password" type="password" class="span3"  id="inputPassword" placeholder="Password">
												
												<a href="cont_passeoublie.php" style="color:red;">Mot de passe oublié?</a>
											</div>
											<div class="control-group">
												<label class="right-label"></label>
												<button type="submit" class="btn btn-success" aria-hidden="true">Connecter</button>
												<button class="btn" data-dismiss="modal"aria-hidden="true">Fermer</button>
											</div>
										</form>
										<hr class="soft"/>
										<div class="alert alert-info">
											<button class="close" data-dismiss="alert" type="button">×</button>
											<a href="cont_inscription.php" style="color:rgb(58, 135, 173);">Vous n'êtes pas encore inscrit ? <strong>Inscrivez-vous <em>maintenant</em> !</strong></a>
										</div>
									</div>
								</div>
							</li>
						</ul>
						<!-- connection modul end  -->
					</div>
				</div>
			</div>
		</div>
		<!-- Navbar end ================================================== -->