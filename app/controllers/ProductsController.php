<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Paginator;
	use App\Models\CategoryModelRepository;
	use App\Models\ProductModelRepository;

	class ProductsController extends Controller{
		private $catId=[];
		private $countProd;

		public function see($id, $page){
			$data=[];
			$data['onPage']=8;
			$catModel=new CategoryModelRepository;
			$objDb=$catModel->getObjDb($catModel->getTable());
			$data['categories']= $catModel->getItems();
			$data['id']=$id;
			$this->getTree($id);
			$data['products']=$this->getProducts($page , $data['onPage']);

			$pagin=new Paginator;
			$pagin->setOnPage($data['onPage']);
			$pagin->setCountItems($this->countProd);
			$pagin->setMaxLi(5);
			$data['pagin']=$pagin->getPagination();
			$this->render('app/views/ViewProducts.php',$data);
		}

		private function getTree( $id){
			$catModel=new CategoryModelRepository;
			$objDb=$catModel->getObjDb($catModel->getTable());
			$categories=$catModel->getItems();
			//$tree = '<ul>';
			    for($i=0; $i<count($categories); $i++){
		        	if($categories[$i]->getParent_id()==$id){
		        		$this->catId[]=$categories[$i]->getId();
		           		//$tree .= '<ul>';
		                //$tree .= '<li><a href="http://localhost/products/see/'.$categories[$i]->getId().'/1">'.$categories[$i]->getName().'</a><br>';
		                //$tree .= '</li>';
		                for($j=1; $j<count($categories); $j++){
		                	if($categories[$j]->getParent_id() == $categories[$i]->getId()){
					            $this->getTree($categories[$i]->getId());
				                break;
			               	}
		            	}
		                //$tree .= '</ul>';
	            	}
	  			}
	  		$this->catId[]=$id;
		    //$tree .= '</ul>';
   			//return $tree;
		}

		private function getProducts($page , $onPage){
			$in='';
			foreach ($this->catId as $id) {
				$in.=$id.',';
			}
			$in=substr($in, 0, -1);
			$prodModel=new ProductModelRepository;
			$objDb=$prodModel->getObjDb($prodModel->getTable());
			$products=$objDb->getByIn('category_id', $in);
			if(!empty($products)){
				$arrProd=array_chunk($products, $onPage);
				$this->countProd=count($products);
				return $arrProd[$page-1];
			}
			else{
				return $products;
			}
		}

	}
?>