<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Request;
	use Framework\Paginator;
	use App\Models\CartModelRepository;
	use App\Models\UsersModelRepository;

	class CartController extends Controller{
		
		public function add(){
			$objRst=new Request;
			$data=$objRst->getParams();
			$arrOfUrl=explode('/',$data['url']);
			$prodId=$arrOfUrl[count($arrOfUrl) - 1];
			$countToCart=$data['countToCart'];
			$data=[];
			if (isset($_SESSION['login'])){
				$data['login']=$_SESSION['login'];
			}
			else{
				$data['login']=$_SERVER['REMOTE_ADDR'];
			}
			$objUsr=new UsersModelRepository;
			$objDb=new Db($objUsr->getTable());
			$user=$objDb->getByParam('login',$data['login']);
			$objCart=new CartModelRepository;
			$objDb=new Db($objCart->getTable());
			$inCart=$objDb->getByParam('login',$data['login']);
			if($inCart){
				for($i=0; $i<count($inCart); $i++){
					if($inCart[$i]['productId']==$prodId){
						$data['id']=$inCart[$i]['id'];
					}
				}
			}
			if($user){
				$data['userId']=$user[0]['id'];
			}
			$data['productId']=$prodId;
			$data['count']=$countToCart;
			$objDb=new Db($objCart->getTable());
			$objDb->save($objCart->set($data));
			$data=json_encode($data);
		}
	}
?>