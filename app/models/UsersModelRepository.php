<?php
	namespace App\Models;
	use Framework\AbstractRepository;
	use App\Models\UsersModel;

	class UsersModelRepository extends AbstractRepository{
		public $table='users';
		
		public function set(array $data):object{
			$obj=new UsersModel;
			$obj->setData($data);
			return $obj;
		}
		public function getTable(){
			return $this->table;
		}
		public function getItems(){
			$objDb=$this->getObjDb($this->table);
			$items=$objDb->getList();
			$itemsObj=[];
			foreach ($items as $value) {
				$itemsObj[]=$this->set($value);
			}
			return $itemsObj;
		}
		public function getItemByParam($column , $value){
			$objDb=$this->getObjDb($this->table);
			$items=$objDb->getByParam($column , $value);
			$itemsObj=[];
			foreach ($items as $value) {
				$itemsObj[]=$this->set($value);
			}
			return $itemsObj;
		}
		public function getLimitItems($from, $many){
			$objDb=$this->getObjDb($this->table);
			$items=$objDb->getLimitList($from, $many);
			$itemsObj=[];
			foreach ($items as $value) {
				$itemsObj[]=$this->set($value);
			}
			return $itemsObj;
		}
	}
?>