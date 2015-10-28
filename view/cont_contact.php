<?php
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
				      <!-- contact module begin -->
				      <hr class="soften">
						<h1>Contactez-nous</h1>
						<hr class="soften"/>	
						<div class="row">
							<div class="span4">
							<h4>Détails</h4>
							<p>	18 Oulad Mimoun,<br/> Nador, Maroc
								<br/><br/>
								info@amrocmart.com<br/>
								﻿Tel 06 13 06 43 30<br/>
								Fax 05 00 00 00 00<br/>
								web:marocmart.com
							</p>		
							</div>
								
							<div class="span4">
							<h4>Heures de réception d'appels</h4>
								<h5> Lundi - Vendredi</h5>
								<p>09:00 - 19:00<br/><br/></p>
								<h5>Samedi</h5>
								<p>09:00 - 12:00<br/><br/></p>
								<h5>Dimanche</h5>
								<p>10:00 - 12:00<br/><br/></p>
							</div>
							<div class="span4">
							<h4>Email</h4>
							<form class="form-horizontal">
						<fieldset>
						  <div class="control-group">
						   
						      <input type="text" placeholder="Nom" class="input-xlarge"/>
						   
						  </div>
							   <div class="control-group">
						   
						      <input type="text" placeholder="Email" class="input-xlarge"/>
						   
						  </div>
							   <div class="control-group">
						   
						      <input type="text" placeholder="Message" class="input-xlarge"/>
						  
						  </div>
						  <div class="control-group">
						      <textarea rows="3" id="textarea" class="input-xlarge"></textarea>
						   
						  </div>
					
						    <button class="btn btn-large" type="submit">Envoyer</button>
					
						</fieldset>
					      </form>
							</div>
						</div>
						<div class="row">
						<div class="span9">
						<iframe style="width:100%; height:100%; border: 0px" scrolling="no" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14&amp;output=embed"></iframe><br />
						<small><a href="https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14" style="color:#0000FF;text-align:left">Agrandir la map</a></small>
						</div>
						</div>
				      <!-- contact module end -->
					
				</div>
			</div>
		</div>
	</div>
<?php
		include_once('../include/meta_footer.php');
?>