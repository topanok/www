<?php
	namespace App\Controllers;
	use App\Controllers\FrontController;
	use Framework\Db;
	use Framework\Request;
	use App\Models\CartModelRepository;
	use App\Models\ProductModelRepository;
	use App\Models\UsersModelRepository;

	class CheckoutController extends FrontController{
		public function order(){
			if (!isset($_SESSION['login'])){
				$_SESSION['auth']=false;
				$_SESSION['login']=$_SERVER['REMOTE_ADDR'];
			}
			$objUsers=new UsersModelRepository;
			$user=$objUsers->getItemByParam('login' , $_SESSION['login']);
			if(!empty($user)){
				$data['user']=$user[0];
			}
			$data['products']=[0=>'s'];
			$this->render('app/views/app/checkout.php', $data);
		}
		public function changeOrder(){

		}
	}
?>