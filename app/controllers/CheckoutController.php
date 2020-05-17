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
			$objUsers=new UsersModelRepository;
			$user=$objUsers->getItemByParam('login' , $_SESSION['login']);
			if(!empty($user)){
				$data['user']=$user[0];
			}
			$this->render('app/views/app/checkout.php', $data);
		}
		public function changeOrder(){

		}
	}
?>