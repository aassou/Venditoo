<?php
//classes loading begin

//classes loading end
?>
<select name="srchCat" class="srchTxt"  style="width:180px;">
	<option value="" selected>Toutes les catégories</option>
		<?php
			include_once('config.php');
			$db = $pdo;
			$categorieManager = new CategorieManager($db);
			$listCategorieNames = $categorieManager->getCategorieNames();
			foreach($listCategorieNames as $categorieNames){
			
		?>
	<option value="<?php echo $categorieNames->nom(); ?>" style="background-color:#f0f0f0;"><?php echo strtoupper($categorieNames->nom()); ?></option>
	<?php } ?>
</select>