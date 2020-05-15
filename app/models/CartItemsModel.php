<?php
	namespace App\Models;

	class CartItemsModel{
		private $columns=[];

		public function setData(array $columns){
			$this->columns=$columns;
		}

		public function getData() {
			return $this->columns;
		}

		public function __call($method, $parameters){
			$arr=array('0'=>'set','1'=>'get');
			if (in_array(substr($method, 0, 3), $arr)){
					$key=strtolower(substr($method, 3));
				if (substr($method, 0, 3)=='set' && array_key_exists($key,$this->columns)){
					$this->columns[$key]=$parameters[0];
				}
				else{
					return $this->columns[$key];
				}
			}
		}
	}
?>