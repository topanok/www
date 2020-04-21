<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use PDO;

	class ProductsController extends Controller{
		private $catId=[];
		private $products=[];
		
		public function category(int $id){
			$pdoCategories=new Db('categories');
			$categories=$pdoCategories->getList();
			$pdoProducts=new Db('products');
			$allProducts=$pdoProducts->getList();

			$data='';
			$data.= $this->getCategories($categories, $id);

			$this->getProducts($allProducts);

			$data.='<center><h1>Продукти</h1></center>';
			if(!empty($this->products)){
				for($i=0; $i<count($this->products); $i++){
						$data.='<h3>'.$this->products[$i]['name'].'</h3><br><b>Опис: </b>'.$this->products[$i]['description'].'<br><b>Характеристики: </b>'.$this->products[$i]['properties'].'<br><b>Ціна: </b>'.$this->products[$i]['price'].'<br><b>Залишок: </b>'.$this->products[$i]['count'].'<br><br><br>';
				}
			}
			$this->render('app/views/ViewProducts.php',$data);
		}

		private function getCategories(array $categories, $id){
			$tree = '<ul>';
			    for($i=0; $i<count($categories); $i++){
		        	if($categories[$i]['parent_id']==$id){
		        		$this->catId[]=$categories[$i]['id'];
		           		$tree .= '<ul>';
		                $tree .= '<li><a href="'.$categories[$i]['id'].'">'.$categories[$i]['name'].'</a><br>';
		                $tree .= '</li>';
		                for($j=1; $j<count($categories); $j++){
		                	if($categories[$j]['parent_id'] == $categories[$i]['id']){
					            $tree.= $this->getCategories($categories, $categories[$i]['id']);
				                break;
			               	}
		            	}
		                $tree .= '</ul>';
	            	}
	  			}
	  		$this->catId[]=$id;
		    $tree .= '</ul>';
   			return $tree;
		}

		private function getProducts(array $products){
			for($i=0; $i<count($products); $i++){
				if(in_array($products[$i]['category_id'], $this->catId)){
					$this->products[]=$products[$i];
				}
			}
		}
	}
?>