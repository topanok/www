<?php
	namespace App\Models;
	use Framework\AbstractRepository;
	use App\Models\WorkersModel;
	class WorkersModelRepository extends AbstractRepository{
		public $table='workers';
		
		public function getById(int $id):object{
			$objDb=$this->getObjDb();
			$obj=new WorkersModel;
			$obj->setData($objDb->getById($id));
			return $obj;
		}
	}
?>