<?php
	namespace App\Controllers ;
	
	use Framework\Controller;
	
	class PageController extends Controller{
		private $content='Page content';
		public function returnPage(){
			return $this->content;
		}
	}
?>
