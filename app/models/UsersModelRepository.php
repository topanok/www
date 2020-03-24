<?php
	namespace App\Models;
	use Framework\AbstractRepository;
	use App\Models\Model;
	class UsersModelRepository extends AbstractRepository{
		public $table='users';
		
		public function set(array $data):object{
			$obj=new Model;
			$obj->setData($data);
			return $obj;
		}
		public function getTable(){
			return $this->table;
		}
	}
?>