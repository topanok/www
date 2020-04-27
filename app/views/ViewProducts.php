<div class="categories">
	<?php
		echo $data['tree'];
	?>
</div>
<div class="products">
	<center><h2>Продукти</h2></center>
		<?php
			for($i=0; $i<count($data['products']); $i++){
				$prod=$data['products'][$i];
		?>
	<h3><?= $prod['name']; ?></h3><br>
	<img src="http://localhost/app/images/<?= $prod['images']; ?>" height="300px"><br>
	<b>Опис: </b><?= $prod['description']; ?><br>
	<b>Характеристики: </b><?= $prod['properties']; ?><br>
	<b>Ціна: </b><?= $prod['price']; ?><br>
	<b>Залишок: </b><?= $prod['count']; ?><br><br><br>
		<?php } ?>
</div>
<div>
	<?php 
		echo $data['pagin'];
	?>
</div> 