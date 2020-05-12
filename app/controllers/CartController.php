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
		public function remove($prodId){
			$objRst=new Request;
			$data=$objRst->getParams();;
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
		public function seeMini(){
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
				$totalSum=0;
				$html='';
				foreach ($data['products'] as $prod){ 
					$totalSum+=$data['counts'][$prod->getId()]*$prod->getPrice();
					$html.='<div class="cart-img-details"><div class="cart-img-photo">';
					$html.='<a href="http://localhost/product/details/'.$prod->getId().'"><img src="http://localhost/app/images/'.$prod->getImages().'" alt="#"></a>';
					$html.='</div><div class="cart-img-content">';
					$html.='<a href="http://localhost/product/details/'.$prod->getId().'"><h4>'.$prod->getName().'</h4></a>';
					$html.='<span><strong class="text-right">'.$data['counts'][$prod->getId()].' x</strong>';
					$html.='<strong class="cart-price text-right">₴'.$prod->getPrice().'</strong></span></div>';
					$html.='<div class="pro-del"><a href="" onclick="removeFromCart('.$prod->getId().')"><i class="fa fa-times"></i></a></div></div>';
				}
				$html.='<div class="clear"></div>';
				$html.='<div class="cart-inner-bottom">';
				$html.='<span class="total">Total:<span class="amount">₴'.$totalSum.'</span></span>';
				$html.='<span class="cart-button-top">';
				$html.='<a href="http://localhost/cart/see">Кошик</a>';
				$html.='<a href="checkout.html">Замовити</a></span></div>';
			}
			else{
				$html='<div class="cart-inner-bottom">';
				$html.='<h4>Порожньо</h4>';
				$html.='<span class="cart-button-top">';
				$html.='<a href="/products/see/0/1">За покупками</a></span></div>';
			}
			echo $html;
		}
	}
?>