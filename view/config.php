<?php
/* 
	Author                      : AASSOU Abdelilah.
	Creation Date               : 08/10/2013.
	FileName					: Config.
	Description					: This file is builded to manage website configurations.
*/
/*define("HOST", "localhost");
define("DBNAME", "sodblodbmodb");
define("USERNAME", "root");
define("PASSWORD", "");
define("CONTROLLER_PATH", "/marocmart_mvc/controller/");
define("MODEL_PATH", "/marocmart_mvc/model/");
define("VIEW_PATH", "/marocmart_mvc/view/");*/
try{
$pdo = new PDO('mysql:host=localhost;dbname=sodblodbmodb', 'root', '');
}
catch(Exception $e){
	die('Error : '.$e->getMessage());
}
$items_per_group = 12;

?>