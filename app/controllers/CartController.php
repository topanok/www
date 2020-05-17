<?php
	namespace App\Controllers;
	use App\Controllers\FrontController;
	use Framework\Db;
	use Framework\Request;
	use App\Models\CartModelRepository;
	use App\Models\CartItemsModelRepository;
	use App\Models\ProductModelRepository;

	class CartController extends FrontController{
		
		public function add(){
			$objRst=new Request;
			$post=$objRst->getParams();
			$prodId=$post['id'];
			$countToCart=$post['countToCart'];
			$objProd=new ProductModelRepository;
			$objCart=new CartModelRepository;
			$objCartItems=new CartItemsModelRepository;
			$product=$objProd->getItemsByParam('id' , $prodId);
			$productSum=$product[0]->getPrice() * $countToCart;
			$cart=$objCart->getItemsByParam('user_login' , $_SESSION['login']);
			if(!empty($cart)){
				$cartItems=$objCartItems->getItemsByParam('cart_id', $cart[0]->getId());
				$dataСart['id']=$cart[0]->getId();
				if(!empty($cartItems)){
					//Апдейтим або пишем в cartitems
					$dataItems['count']=$countToCart;
					$dataItems['sum']=$productSum;
					foreach ($cartItems as $item) {
						if($item->getProduct_id()==$prodId){
							$dataItems['id']=(int)$item->getId();
							$dataItems['count']=$countToCart + $item->getCount();
							$dataItems['sum']=$productSum + $item->getSum();
							if(isset($post['update'])){
								$dataItems['id']=$item->getId();
								$dataItems['count']=$countToCart;
								$dataItems['sum']=$productSum;
							}
						}
					}
					$dataItems['cart_id']=$cart[0]->getId();
					$dataItems['product_id']=$prodId;
					$objDb=new Db($objCartItems->getTable());
					$objDb->save($objCartItems->set($dataItems));
					//Апдейтим cart
					$dataСart['count_all']=$objCartItems->getTotalCount('count', 'cart_id');
					$dataСart['total_sum']=$objCartItems->getTotalSum('sum', 'cart_id');
					$objDb=new Db($objCart->getTable());
					$objDb->save($objCart->set($dataСart));
					//Вертаємо для Ajax загальну сумму
					echo '₴'.$dataСart['total_sum'];
				}
				else{
					//апдейтим cart 
					$dataСart['id']=$cart[0]->getId();
					$dataСart['count_all']=$countToCart;
					$dataСart['total_sum']=$productSum;
					$objDb=new Db($objCart->getTable());
					$objDb->save($objCart->set($dataСart));
					//пишемо новий запис в cartitems
					$dataItems['cart_id']=$cart[0]->getId();
					$dataItems['product_id']=$prodId;
					$dataItems['count']=$countToCart;
					$dataItems['sum']=$productSum;
					$objDb=new Db($objCartItems->getTable());
					$objDb->save($objCartItems->set($dataItems));
					//Вертаємо для Ajax загальну сумму
					echo '₴'.$dataItems['sum'];
				}
			}
			else{
				//пишемо нові записи в cart і cartitems
				$dataСart['user_login']=$_SESSION['login'];
				$dataСart['count_all']=$countToCart;
				$dataСart['total_sum']=$productSum;
				$objDb=new Db($objCart->getTable());
				$objDb->save($objCart->set($dataСart));
				$cart=$objCart->getItemsByParam('user_login' , $_SESSION['login']);
				$dataItems['cart_id']=$cart[0]->getId();
				$dataItems['product_id']=$prodId;
				$dataItems['count']=$countToCart;
				$dataItems['sum']=$productSum;
				$objDb=new Db($objCartItems->getTable());
				$objDb->save($objCartItems->set($dataItems));
				//Вертаємо для Ajax загальну сумму
				echo '₴'.$dataСart['total_sum'];
			}
		}
		public function remove($prodId){
			$objCartItems=new CartItemsModelRepository;
			$objCart=new CartModelRepository;
			$item=$objCart->getItemsByParam('user_login' , $_SESSION['login']);
			$cartId=$item[0]->getId();
			$arrClolumns=[0=>'cart_id', 'product_id'];
			$arrValues=[0=>$cartId, $prodId];
			$objDb=new Db($objCartItems->getTable());
			$objDb->delByParams($arrClolumns, $arrValues);
			//перезаписуєм cart
			$cartItems=$objCartItems->getItemsByParam('cart_id', $cartId);
			if(!empty($cartItems)){
				$dataСart['count_all']=$objCartItems->getTotalCount('count', 'cart_id');
				$dataСart['total_sum']=$objCartItems->getTotalSum('sum', 'cart_id');
			}
			else{
				$dataСart['count_all']=0;
				$dataСart['total_sum']=0;
			}
			$dataСart['id']=$cartId;
			$dataСart['user_login']=$_SESSION['login'];
			$objDb=new Db($objCart->getTable());
			$objDb->save($objCart->set($dataСart));
		}
		public function see(){
			if (!isset($_SESSION['login'])){
				$_SESSION['login']=$_SERVER['REMOTE_ADDR'];
			}
			$data=$this->getData();
			if($data['products']){
				$this->render('app/views/app/cart.php', $data);
			}
			else{
				$this->render('app/views/app/cart.php', null);
			}
		}

		public function seeMini(){
			$data=$this->getData();
			if($data['products']){
				$html='';
				foreach ($data['products'] as $prod){
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
				$html.='<span class="total">Total:<span class="amount">₴'.$data['totalSum'].'</span></span>';
				$html.='<span class="cart-button-top">';
				$html.='<a href="/cart/see">Кошик</a>';
				$html.='<a href="/checkout/see">Замовити</a></span></div>';
			}
			else{
				$html='<div class="cart-inner-bottom">';
				$html.='<h4>Порожньо</h4>';
				$html.='<span class="cart-button-top">';
				$html.='<a href="/products/see/0/1">За покупками</a></span></div>';
			}
			echo $html;
		}
		private function getData(){
			$objProd=new ProductModelRepository;
			$objCart=new CartModelRepository;
			$objCartItems=new CartItemsModelRepository;
			$item=$objCart->getItemsByParam('user_login' , $_SESSION['login']);
			if(!empty($item)){
				$cartId=$item[0]->getId();
				$inCart=$objCartItems->getItemsByParam('cart_id' , $cartId);
			}
			if(!empty($inCart)){
				$objProd=new ProductModelRepository;
				$strIds='';
				$arrCounts=[];
				$arrSums=[];
				foreach ($inCart as $item) {
					$strIds.=$item->getProduct_id().',';
					$arrCounts[$item->getProduct_id()]=$item->getCount();
				}
				$strIds=substr($strIds,0,-1);
				$data['products']=$objProd->getItemsByIn('id',$strIds);;
				$data['counts']=$arrCounts;
				$data['arrSums']=$arrSums;
				$data['totalSum']=$objCartItems->getTotalSum('sum', 'cart_id');
				return $data;
			}
		}
	}
?>