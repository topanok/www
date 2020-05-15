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
		public function getTotalSum(string $column, string $groupBy){
			$objDb=$this->getObjDb($this->table);
			$result=$objDb->getSumByParams($column, $groupBy);
			$totalSum=$result["sum(sum)"];
			return $totalSum;
		}
		public function getTotalCount(string $column, string $groupBy){
			$objDb=$this->getObjDb($this->table);
			$result=$objDb->getSumByParams($column, $groupBy);
			$totalCount=$result["sum(count)"];
			return $totalCount;
		}
	}
?>