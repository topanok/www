<?php
	namespace App\Models;
	use Framework\AbstractRepository;
	class WorkersModelRepository extends AbstractRepository{
		private $table='workers';
		
		public function getById(int $id):object{
			$objDb=Framework\AbstractRepository::getObjDb();
			$obj=new App\Models\WorkersModel;
			$obj->setData($objDb->getById($id));
			return $obj;
		}
	}
?>