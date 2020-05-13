<?php
	namespace App\Controllers;
	use App\Controllers\FrontController;
	use Framework\Db;
	use Framework\Request;
	use App\Models\CartModelRepository;
	use App\Models\ProductModelRepository;

	class CheckoutController extends FrontController{
		public function see(){
			$this->render('app/views/app/checkout.php', null);
		}
	}
?>