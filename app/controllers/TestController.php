<?php
	namespace App\Controllers;

	use PDO;
	use Framework\AbstractRepository;
	
	class TestController extends AbstractRepository{

		private $table='workers';

		public function getById(int $id):array{
			//$obj=new App\Models\WorkersModel;
			$obj=Framework\AbstractRepository::getObjDb;
			var_dump($obj);
			return $obj;
		}
	}
?>