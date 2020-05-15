<?php
	namespace App\Controllers;

	use App\Models\CategoryModelRepository;
	use App\Models\CartModelRepository;
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

			$objCart=new CartModelRepository;
			$item=$objCart->getItemsByParam('user_login' , $_SESSION['login']);
			if(!empty($item)){
				$data['totalSum']=$item[0]->getTotal_sum();
			}
			else{
				$data['totalSum']=0;
			}
			return $data;
	    }
	}
?>