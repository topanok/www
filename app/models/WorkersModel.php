<?php
	namespace App\Models;

	class WorkersModel{
		public $id;
		public $name;
		public $age;
		public $salary;
		
		public function __construct($name,$age,$salary){
			$this->name=$name;
			$this->age=$age;
			$this->salary=$salary;
		}
		public function getOptions() {
			return get_object_vars($this);
		}
	}
?>
