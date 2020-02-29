<?php
	namespace Framework;
	
	abstract class Controller {
		public function render($path,$data){
			require_once $path;
			return $data;
		}
	}
?>