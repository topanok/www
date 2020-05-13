<?php
	namespace App\Controllers;

	use App\Models\CategoryModelRepository;
	use App\Controllers\CartController;
	use Framework\Controller;

	class FrontController extends Controller
	{
	    public function render($template, $data = [])
	    {
	        parent::render('app/views/app/header.php', $this->headerData());
	        parent::render($template, $data);
	        parent::render('app/views/app/footer.php',[]);
	    }

	    private function headerData(){
	    	$catModel=new CategoryModelRepository;
			$objDb=$catModel->getObjDb($catModel->getTable());
			$data['categories']= $catModel->getItems();

			$objCart=new CartController;
			$inCart=$objCart->getData();
			if($inCart['totalSum']){
				$data['totalSum']=$inCart['totalSum'];
			}
			else{
				$data['totalSum']=0;
			}

			return $data;
	    }
	}
?>