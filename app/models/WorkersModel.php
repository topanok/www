<?php
	namespace App\Models;

	class WorkersModel{
		private $columns=[];

		protected function setData(array $columns){
			$this->columns=$columns;
		}

		protected function getData() {
			return $this->columns;
		}
		
		protected function setName($name){
			$this->columns['name']=$name;
		}
		protected function getName(){
			return $this->columns['name'];
		}
		protected function setAge($age){
			$this->columns['age']=$age;
		}
		protected function getAge(){
			return $this->columns['age'];
		}
		protected function setSalary($salary){
			$this->columns['salary']=$salary;
		}
		protected function getSalary(){
			return $this->columns['salary'];
		}
		public function __call($method, $parameters){
			if (in_array($method, get_class_methods($this))){
				return call_user_func_array(array($this, $method), $parameters);
			}
		}
	}
?>
