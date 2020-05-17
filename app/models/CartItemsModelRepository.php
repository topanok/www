<?php
	namespace App\Models;
	use Framework\AbstractRepository;
	use App\Models\CategoryModel;

	class CartItemsModelRepository extends AbstractRepository{
		public $table='cartitems';
		
		public function set(array $data):object{
			$obj=new CartItemsModel;
			$obj->setData($data);
			return $obj;
		}
		public function getTable(){
			return $this->table;
		}
		public function getItemsByParam($column , $value){
			$objDb=$this->getObjDb($this->table);
			$items=$objDb->getByParam($column , $value);
			$itemsObj=[];
			foreach ($items as $value) {
				$itemsObj[]=$this->set($value);
			}
			return $itemsObj;
		}
		public function getItemsByParams(array $columns , array $values){
			$objDb=$this->getObjDb($this->table);
			$items=$objDb->getByParams($columns , $values);
			$itemsObj=[];
			foreach ($items as $value) {
				$itemsObj[]=$this->set($value);
			}
			return $itemsObj;
		}
		public function getColumnSum(string $SumColumn, string $WhereColumn, $WhereColumnVal){
			$objDb=$this->getObjDb($this->table);
			$result=$objDb->getSumByParams($SumColumn, $WhereColumn, $WhereColumnVal);
			$totalSum=$result['sum('.$SumColumn.')'];
			return $totalSum;
		}
	}
?>