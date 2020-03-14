<?php
	namespace Framework;

	use Framework\Db;
	
	class AbstractRepository{
		public function getObjDb($table){
			$objDb=new Db($table);
			return $objDb;
		}
	}
?>