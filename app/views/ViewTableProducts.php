<table class="table">
	<tr>
			<?php foreach ($data['columns'] as $elem){ ?>
		<th><?php echo $elem; ?></th>
				<?php } ?>
		<th>видалити</th>
		<th>редагувати</th>
	</tr>
				<?php for($tr=0; $tr<$data['onPage']; $tr++) {
					if(isset($data['products'][$tr])){ 
				?>
	<tr>
				<?php 
					for ($td=0; $td<count($data['columns']); $td++){ 
					$function='get'.ucfirst($data['columns'][$td]);
							if($function=='getImages'){ 
				?>
		<td><?php echo $data['products'][$tr]->$function(); ?><br>
			<a href="http://localhost/app/images/<?php echo $data['products'][$tr]->$function(); ?>"><img src="http://localhost/app/images/<?php echo $data['products'][$tr]->$function(); ?>" height="60px"></a>
		</td>
				<?php
					}
					else{ 
				?>
		<td><?php echo $data['products'][$tr]->$function(); ?></td>
				<?php 
					}}
					$id=$data['products'][$tr]->getId() * 1; 
				?>
		<td><a href="http://localhost/product/delete/<?php echo $id; ?>">видалити</a></td>
		<td><a href="http://localhost/product/edit/<?php echo $id; ?>">редагувати</a></td>
	</tr>
				<?php
					} } 
				?>
</table>
<a href="http://localhost/product/add"><h2>Додати продукт</h2></a>
<?php 
	echo $data['pagin'];
?>