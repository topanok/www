<?php
	namespace App\Controllers ;
	
	use Framework\Controller;
	use Framework\Request;
	
	class PageController extends Controller{
		private $content='Page content';
		public function returnPage(){
			return $this->content;
		}
		public function getRequest(){
			return new Request;
		}
	}
?>
