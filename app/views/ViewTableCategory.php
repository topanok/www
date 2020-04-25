<div>
	<center><h2>Категорії</h2></center>
		<?php
			$table= '<table class="table"><tr>';
			foreach ($data['columns'] as $elem){
				$table.= '<th>'. $elem .'</th>';
			}
			$table.= "<th>видалити</th>";
			$table.= "<th>редагувати</th>";
			$table.= '</tr>';

			for($tr=0; $tr<$data['onPage']; $tr++) {
				if(isset($data['arr'][$data['page']-1][$tr])){
					$table.= '<tr>';
					for ($td=0; $td<count($data['columns']); $td++){ 
						$function='get'.ucfirst($data['columns'][$td]);
						$table.= '<td>'. $data['arr'][$data['page']-1][$tr]->$function() .'</td>';
					}
					$id=$data['arr'][$data['page']-1][$tr]->getId() * 1;
					$table.= '<td>'.'<a href="http://localhost/category/delete/'.$id.'">'.'видалити'.'</a>'.'</td>';
					$table.= '<td>'.'<a href="http://localhost/category/edit/'.$id.'">'.'редагувати'.'</a>'.'</td>';
					$table.= '</tr>';
				}
			}
			$table.='</table>';
			echo $table;
			echo '<a href="http://localhost/category/add"><h2>Додати категорію</h2></a>';
			echo $data['pagin'];
		?>
</div>