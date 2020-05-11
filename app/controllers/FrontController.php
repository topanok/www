<?php
	namespace App\Controllers;

	use App\Models\CategoryModelRepository;
	use Framework\Controller;

	class FrontController extends Controller
	{
	    public function render($template, $data = [])
	    {
	        parent::render('app/views/app/header.php',[]);
	        parent::render($template, $data);
	        parent::render('app/views/app/footer.php',[]);
	    }

	    private function getCategories(){
	    	$catModel=new CategoryModelRepository;
			$objDb=$catModel->getObjDb($catModel->getTable());
			$data['categories']= $catModel->getItems();
			return $data['categories'];
	    }
	}
?>