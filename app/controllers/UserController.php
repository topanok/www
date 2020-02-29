<?php
	namespace App\Controllers;
	
	use Framework\Controller;
	
	class UserController extends Controller{
		private $users=['Ivan','Bogdan','Petjko'];
		public function seeUsers(){
			return $this->render('app/views/ViewUsers.php',$this->users);
		}
	}
?>