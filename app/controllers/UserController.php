<?php
	namespace App\Controllers;
	
	use Framework\Controller;
	use Framework\Request;
	
	class UserController extends Controller{
		private $users=['Ivan','Bogdan','Petjko'];
		public function seeUsers(){
			return $this->render('app/views/ViewUsers.php',$this->users);
		}
		public function getRequest(){
			return new Request;
		}
	}
?>