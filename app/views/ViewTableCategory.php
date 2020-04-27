<div>
	<center><h2>Категорії</h2></center>
	<table class="table">
		<tr>
			<th>Id</th>
			<th>Назва</th>
			<th>Parent Id</th>
			<th>видалити</th>
			<th>редагувати</th>
		</tr>
	<?php foreach ( $data['categories'] as $category): ?>
		<tr>
			<td><?=$category->getId()?></td>
			<td><?=$category->getName()?></td>
			<td><?=$category->getParent_id()?></td>
			<td>
				<a href="http://localhost/category/delete/<?=$category->getId()?>" >видалити</a>
			</td>
			<td>
				<a href="http://localhost/category/edit/<?=$category->getId()?>" >редагувати</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<a href="http://localhost/category/add"><h2>Додати категорію</h2></a>
	<?php
		echo $data['pagin'];
	?>
</div>