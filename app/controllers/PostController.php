<?php
	namespace App\Controllers;
	
	use Framework\Controller;
	use Framework\Request;
	
	class PostController extends Controller{
		public function create($text,$text2){
			$content=$text.$text2;
			file_put_contents('Test.txt',$content);
			return 'Ви успішно додали контент- " '.$content.'" '. 'в файл- Test.txt';
		}
		public function addText(){
			echo 'yes';
		}
		public function getRequest(){
			return new Request;
		}
	}
?>
