<?php
	namespace App\Config;
	
	abstract class DBConfig{
	
		private $userName='root';
		private $pass='root';

		public function getName(){
			return $this->userName;
		}

		public function getPass(){
			return $this->pass;
		}

	}
?>