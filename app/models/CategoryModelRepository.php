<?php
	namespace App\Models;
	use Framework\AbstractRepository;
	use App\Models\CategoryModel;

	class CategoryModelRepository extends AbstractRepository{
		public $table='categories';
		
		public function set(array $data):object{
			$obj=new CategoryModel;
			$obj->setData($data);
			return $obj;
		}
		public function getTable(){
			return $this->table;
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
		public function getItems(){
			$objDb=$this->getObjDb($this->table);
			$items=$objDb->getList();
			$itemsObj=[];
			foreach ($items as $value) {
				$itemsObj[]=$this->set($value);
			}
			return $itemsObj;
		}
	}
?>