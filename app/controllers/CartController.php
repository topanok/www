<?php
	namespace App\Controllers;
	use App\Controllers\FrontController;
	use Framework\Db;
	use Framework\Request;
	use App\Models\CartModelRepository;
	use App\Models\ProductModelRepository;

	class CartController extends FrontController{
		
		public function add(){
			$objRst=new Request;
			$post=$objRst->getParams();
			$prodId=$post['id'];
			$countToCart=$post['countToCart'];
			$data=[];
			if (!isset($_SESSION['login'])){
				$_SESSION['login']=$_SERVER['REMOTE_ADDR'];
			}
			$data['login']=$_SESSION['login'];
			$objCart=new CartModelRepository;
			$inCart=$objCart->getItemsByParam('login',$data['login']);
			if(!empty($inCart)){
				foreach ($inCart as $product) {
					if($product->getProduct_id()==$prodId){
						if(isset($post['update'])){
							$data['id']=$product->getId();
							$data['count']=$countToCart;
						}
						else{
						$data['id']=$product->getId();
						$data['count']=$countToCart+$product->getCount();
						}
					}
					else{
						$data['count']=$countToCart;
					}
				}
			}
			$data['product_id']=$prodId;
			$objDb=new Db($objCart->getTable());
			$objDb->save($objCart->set($data));
			var_dump($data);
		}
		public function remove(){
			$objRst=new Request;
			$data=$objRst->getParams();
			$prodId=$data['id'];
			$arrClolumns=[0=>'product_id', 'login'];
			$arrValues=[0=>$prodId, $_SESSION['login']];
			$objCart=new CartModelRepository;
			$objDb=new Db($objCart->getTable());
			$objDb->delByParams($arrClolumns, $arrValues);
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
				$data['products']=$objProd->getItemsByIn('id',$strIds);;
				$data['counts']=$arrCounts;
				$this->render('app/views/app/cart.php', $data);
			}
			else{
				$this->render('app/views/app/cart.php', null);
			}
		}
	}
?>