<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use App\Models\CategoryModelRepository;
	use App\Models\ProductModelRepository;

	class ProductsController extends Controller{
		private $catId=[];
		private $products=[];

		public function see(int $id){
			$catModel=new CategoryModelRepository;
			$categories=$catModel->getItems();
			$prodModel=new ProductModelRepository;
			$allProducts=$prodModel->getItems();

			$data='';
			$data.= $this->getCategories($categories, $id);

			$this->getProducts($allProducts);

			if(!empty($this->products)){
				for($i=0; $i<count($this->products); $i++){
					$data.='<h3>'.$this->products[$i]->getName().'</h3><br><img src="http://localhost/app/images/'.$this->products[$i]->getImages().'" height="300px"><br><b>Опис: </b>'.$this->products[$i]->getDescription().'<br><b>Характеристики: </b>'.$this->products[$i]->getProperties().'<br><b>Ціна: </b>'.$this->products[$i]->getPrice().'<br><b>Залишок: </b>'.$this->products[$i]->getCount().'<br><br><br>';
				}
			}
			$this->render('app/views/ViewProducts.php',$data);
		}

		private function getCategories(array $categories, $id){
			$tree = '<ul>';
			    for($i=0; $i<count($categories); $i++){
		        	if($categories[$i]->getParent_id()==$id){
		        		$this->catId[]=$categories[$i]->getId();
		           		$tree .= '<ul>';
		                $tree .= '<li><a href="'.$categories[$i]->getId().'">'.$categories[$i]->getName().'</a><br>';
		                $tree .= '</li>';
		                for($j=1; $j<count($categories); $j++){
		                	if($categories[$j]->getParent_id() == $categories[$i]->getId()){
					            $tree.= $this->getCategories($categories, $categories[$i]->getId());
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
				if(in_array($products[$i]->getCategory_id(), $this->catId)){
					$this->products[]=$products[$i];
				}
			}
		}
	}
?>