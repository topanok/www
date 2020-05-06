<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;

	class CartController extends Controller{
		private $count;
		public function add(){
			$data='';
			foreach ($_POST as $key => $value) {
			  $data .= $key . ' = ' . $value . ' ';
			}
			var_dump($_POST);
		}
	}
?>