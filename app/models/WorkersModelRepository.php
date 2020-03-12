<?php
	namespace App\Models;
	use Framework\AbstractRepository;
	class WorkersModelRepository extends AbstractRepository{
		private $table='workers';
		
		public function getById(int $id):object{
			$stmt = $this->connect()->query(" SELECT * FROM $this->table WHERE id = $id ");
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$obj=new App\Models\WorkersModel;
			$obj->setData($result);
			return $obj;
		}
	}
?>