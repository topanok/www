<div>
	<center><h2>Категорії</h2></center>
	<table class="table">
		<tr>
			<?php foreach ($data['columns'] as $elem){?>
			<th> <?php echo $elem; }?>  </th>
			<th>видалити</th>
			<th>редагувати</th>
		</tr>
			<?php
				for($tr=0; $tr<$data['onPage']; $tr++) {
				if(isset($data['categories'][$tr])){ 
			?>
		<tr>
			<?php 
				for ($td=0; $td<count($data['columns']); $td++){ 
				$function='get'.ucfirst($data['columns'][$td]); 
			?>
			<td> 
				<?php echo $data['categories'][$tr]->$function(); } ?> 
			</td>
				<?php $id=$data['categories'][$tr]->getId() * 1; ?>
			<td>
				<a href="http://localhost/category/delete/<?php echo $id ?>" >видалити</a>
			</td>
			<td>
				<a href="http://localhost/category/edit/<?php echo $id ?>" >редагувати</a>
			</td>
		</tr>
			<?php } } ?>
	</table>
	<a href="http://localhost/category/add"><h2>Додати категорію</h2></a>
	<?php
		echo $data['pagin'];
	?>
</div>