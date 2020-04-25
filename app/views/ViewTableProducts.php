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
				if($function=='getImages'){
					$table.= '<td>'.$data['arr'][$data['page']-1][$tr]->$function().'<br><a href="http://localhost/app/images/'.$data['arr'][$data['page']-1][$tr]->$function().'"><img src="http://localhost/app/images/'.$data['arr'][$data['page']-1][$tr]->$function().'" height="60px"></a></td>';
				}
				else{
					$table.= '<td>'. $data['arr'][$data['page']-1][$tr]->$function() .'</td>';
				}
			}
			$id=$data['arr'][$data['page']-1][$tr]->getId() * 1;
			$table.= '<td>'.'<a href="http://localhost/product/delete/'.$id.'">'.'видалити'.'</a>'.'</td>';
			$table.= '<td>'.'<a href="http://localhost/product/edit/'.$id.'">'.'редагувати'.'</a>'.'</td>';
			$table.= '</tr>';
		}
	}
	$table.='</table>';
	echo $table;
	echo '<a href="http://localhost/product/add"><h2>Додати продукт</h2></a>';
	echo $data['pagin'];
?>