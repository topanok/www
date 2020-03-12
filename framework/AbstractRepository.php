<?php
	namespace Framework;

	use Framework\Db;
	
	class AbstractRepository{
		public function getObjDb(){
			$objDb=new Db;
			return $objDb;
		}
	}
?>