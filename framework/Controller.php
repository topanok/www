<?php
	namespace Framework;
	
	use Framework\Request;
	
	abstract class Controller {
		public function render($path,$data){
			require_once $path;
			return $data;
		}
		public function getRequest(){
			return new Request;
		}
	}
?>