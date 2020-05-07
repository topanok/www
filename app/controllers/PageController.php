<?php
	namespace App\Controllers ;
	
	use Framework\Controller;
	
	class PageController extends FrontController{
		private $content='Page content';
		public function returnPage(){
			return $this->content;
		}
	}
?>
