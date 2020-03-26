<?php
	namespace App\Controllers;

	class LogoutController{
		public function go(){
			unset($_SESSION['login']);
		}
	}
?>