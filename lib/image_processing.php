<?php 
function imageProcessing($source){
	$image="../view/themes/images/logo_bootshop.png";
	if(isset($source) && $source['error']==0){
		if($source['size']<=1000000){
			$extensionsAutorise = array('png', 'gif', 'jpeg', 'jpg', 'PNG', 'JPG', 'JPEG', 'GIF');
			$infosFichier = pathinfo($source['name']);
			$extensionUpload = $infosFichier['extension'];
			if(in_array($extensionUpload, $extensionsAutorise)){
				$nameUpload = basename($source['name']);
				$nameUpload = $nameUpload.uniqid();
				move_uploaded_file($source['tmp_name'], '../view/themes/solomoimg/'.$nameUpload);
				$image = '../view/themes/solomoimg/'.$nameUpload;
			}
		}
	}
	return $image;
}
?>