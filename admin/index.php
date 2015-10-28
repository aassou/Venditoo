<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin Page Restricted Page</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	
</head>
<body>
	<div class="span12">	
		<div class="hero-unit">
			<h1>Panneau d'administration</h1>
	    		<p>Connectez-vous pour accéder à votre profil d'administration</p>
		</div>
		<div class="span5 well">	
			<h3>Se connecter</h3>
			<form action="panel.php" method="post">
				<div class="control-group">

						<label style="width:200px">Login</label>
						<input name="login" type="text" value="">

				</div>
				<div class="control-group">
					<div class="controls">
						<label style="width:200px">Mot de passe</label>
						<input name="login" type="password" value="">
					</div>
				</div>
				<div class="controls">
					<input class="btn btn-success" name="submit" type="submit" value="OK">
				</div>
			</form>
			</div>
		</div>
</body>
<html>