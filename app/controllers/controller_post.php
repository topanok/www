<?php
	class Post {
		public function create($text,$text2){
			$content=$text.$text2;
			file_put_contents('Test.txt',$content);
		}
		public function addText(){
			echo 'yes';
		}
	}
?>