<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Request;
	use App\Models\CartModelRepository;
	use App\Models\UsersModelRepository;
	use App\Models\ProductModelRepository;

	class CartController extends FrontController{
		
		public function add(){
			$objRst=new Request;
			$data=$objRst->getParams();
			$prodId=$data['id'];
			$countToCart=$data['countToCart'];
			$data=[];
			if (!isset($_SESSION['login'])){
				$_SESSION['login']=$_SERVER['REMOTE_ADDR'];
			}
			$data['login']=$_SESSION['login'];
			$objUsr=new UsersModelRepository;
			$objCart=new CartModelRepository;
			$inCart=$objCart->getItemsByParam('login',$data['login']);
			if(!empty($inCart)){
				foreach ($inCart as $product) {
					if($product->getProduct_id()==$prodId){
						$data['id']=$product->getId();
					}
				}
			}
			$data['product_id']=$prodId;
			$objProd=new ProductModelRepository;
			$objDb=new Db($objProd->getTable());
			$product=$objDb->getByParam('id', $prodId);
			$data['count']=$countToCart;
			$objDb=new Db($objCart->getTable());
			$objDb->save($objCart->set($data));
		}

		public function remove(){
			$objRst=new Request;
			$data=$objRst->getParams();
			$prodId=$data['id'];
			$objCart=new CartModelRepository;
			$objDb=new Db($objCart->getTable());
			$objDb->delByParam('product_id', $prodId);
		}
		public function see(){
			if (!isset($_SESSION['login'])){
				$_SESSION['login']=$_SERVER['REMOTE_ADDR'];
			}
			$objCart=new CartModelRepository;
			$items=$objCart->getItemsByParam('login',$_SESSION['login']);
			if($items){
				$objProd=new ProductModelRepository;
				$strIds='';
				$arrCounts=[];
				foreach ($items as $item) {
					$strIds.=$item->getProduct_id().',';
					$arrCounts[$item->getProduct_id()]=$item->getCount();
				}
				$strIds=substr($strIds,0,-1);
				$products['products']=$objProd->getItemsByIn('id',$strIds);;
				$products['counts']=$arrCounts;
				$this->render('app/views/app/cart.php', $products);
			}
			else{
				$this->render('app/views/app/cart.php', null);
			}
		}
	}
?>