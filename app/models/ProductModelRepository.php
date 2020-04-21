<?php
	namespace App\Models;
	use Framework\AbstractRepository;
	use App\Models\ProductModel;

	class ProductModelRepository extends AbstractRepository{
		public $table='products';
		
		public function set(array $data):object{
			$obj=new ProductModel;
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
	}
?>