<?php
	namespace Framework;
	
	use PDO;
	use Framework\ConnectDB;
	
	class AbstractRepository extends ConnectDB{
		public function getObjDb(){
			$objDb=new ConnectDB;
			return $objDb;
		}
	}
?>