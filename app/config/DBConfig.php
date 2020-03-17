<?php
	namespace App\Config;
	
	abstract class DBConfig{
		private $userName='root';
		private $pass='123456';
		
		public function getName(){
			return $this->userName;
		}
		
		public function getPass(){
			return $this->pass;
		}
	}
?>