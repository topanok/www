<?php
	namespace App\Models;
	use Framework\AbstractRepository;
	use App\Models\Model;
	class WorkersModelRepository extends AbstractRepository{
		public $table='workers';
		
		public function getById(int $id):object{
			$objDb=$this->getObjDb($this->table);
			$obj=new Model;
			$obj->setData($objDb->getById($id));
			return $obj;
		}
	}
?>