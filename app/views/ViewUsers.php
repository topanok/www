
	<center><h1>Юзери</h1> </center>
	<p> <table> 
			<tr>
			<td>Ім'я</td>
			</tr>
			<?php
				for($i=0;$i<count($data);$i++) 	{
					echo '<tr><td>'.$data[$i].'</td></tr>'; 
				} 	
			?> 
		</table> 
	</p>