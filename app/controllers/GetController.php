<?php
	namespace App\Controllers ;
	
	use Framework\Controller;
	use Framework\Request;
	
	class GetController extends Controller{
		public function yes(){
		echo 'class Get';
		}
		public function getRequest(){
			return new Request;
		}
	}
	
?>
