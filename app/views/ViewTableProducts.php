<table class="table"> 
	<tr>
		<th>Id</th>
		<th>Id Категорії</th>
		<th>Назва</th>
		<th>Зображення</th>
		<th>Опис</th>
		<th>Характеристики</th>
		<th>Ціна</th>
		<th>Кількість</th>
		<th>видалити</th>
		<th>редагувати</th>
	</tr>
			<?php foreach ($data['products'] as $product): ?>
	<tr>
		<td><?= $product->getId(); ?><br>
		<td><?= $product->getCategory_id(); ?><br>
		<td><?= $product->getName(); ?><br>
		<td><a href="http://localhost/app/images/<?= $product->getImages(); ?>"><img src="http://localhost/app/images/<?= $product->getImages(); ?>" height="60px"></a><?= $product->getImages(); ?><br>
		<td><?= $product->getDescription(); ?><br>
		<td><?= $product->getProperties(); ?><br>
		<td><?= $product->getPrice(); ?><br>
		<td><?= $product->getCount(); ?><br>
		<td><a href="http://localhost/product/delete/<?php echo $product->getId(); ?>">видалити</a></td>
		<td><a href="http://localhost/product/edit/<?php echo $product->getId(); ?>">редагувати</a></td>
	</tr>
			<?php endforeach; ?>
</table>
<a href="http://localhost/product/add"><h2>Додати продукт</h2></a>
<?php 
	echo $data['pagin'];
?>