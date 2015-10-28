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
							<!--a href="index.php"><span class="btn btn-mini">Français</span>&nbsp;<img src="themes/images/ico/franced.png" /></a-->
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
							<?php //include('categorie_list.php'); ?>
							<select name="srchVille" class="srchTxt" style="width:160px;">
							<?php include('ville.html'); ?>
							</select>

							<button type="submit" id="submitButton" class="btn btn-info btn-mini"><img src="themes/images/search.png" /></button>
						</form>
						<!-- connection modul begin  -->
						<ul id="topMenu" class="nav pull-right">
							<!--li class=""><a href="special_offer.html">Specials Offer</a></li-->
							<!--li class=""><a href="normal.html">Delivery</a></li-->
							<!--li class=""><a href="contact.html">Contact</a></li-->
							<!--li class="">
								<a href="cont_deconnexion.php" style="padding-right:0"><span class="btn btn-danger btn-large">Déconnexion</span></a>
								
							</li-->
						</ul>
						<!-- connection modul end  -->
						<!-- test dropdown button begin-->
						<div class="btn-group" style="float:right; display:inline-block;margin-top:10px;">
							<button class="btn btn-danger btn-large dropdown-toggle" data-toggle="dropdown">
								Mon Compte&nbsp;<i class="icon-white icon-user"></i>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="myads.php">Mes annonces</a></li>
								<li><a href="myprofil.php">Mon profil</a></li>
								<li class="divider"></li>
								<li><a href="cont_deconnexion.php">Déconnexion</a></li>
							</ul>
						</div>
						<!-- test dropdown button end-->
					</div>
				</div>
			</div>
		</div>
		<!-- Navbar end ================================================== -->