<?php
	namespace App\Controllers;
	use App\Controllers\FrontController;
	use Framework\Db;
	use Framework\Paginator;
	use Framework\Request;
	use Framework\FormBuilder;
	use App\Models\ReviewsModelRepository;

	class ReviewsController extends FrontController{
		public function see($page){
			$_SESSION['page']=$page;
			$objRev=new ReviewsModelRepository;
			$data=[];
			$data['reviews']=$objRev->getItemsByParam('status' , 0);
			$data['page']=$page;
			$data['onPage']=10;
			$from=($page-1) * $data['onPage'];
			$countRev=count($data['reviews']);
			$pagin=new Paginator;
			$pagin->setOnPage($data['onPage']);
			$pagin->setCountItems($countRev);
			$pagin->setMaxLi(5);
			$data['pagin']=$pagin->getPagination();
			$this->render('app/views/admin/tableReviews.php',$data);
		}
		public function edit($id){
			$objRev=new ReviewsModelRepository;
			$review=$objRev->getItemsByParam('id' , $id);
			$_SESSION['reviewId']=$id;
			$_SESSION['values']['form']['editReview']['name']=$review[0]->getUser_name();
			$_SESSION['values']['form']['editReview']['review']=$review[0]->getReview();
			$_SESSION['values']['form']['editReview']['status']=$review[0]->getStatus();
			$form = new FormBuilder;
			$form->setAction('http://localhost/reviews/update');
			$form->setId('editReview');
			$form->setMethod('POST');
			$form->setClass('');
			
			$form->addField('text',['name'=>'name','class'=>'form-control']);
			$form->addField('textarea',['name'=>'review','class'=>'form-control', 'rows'=>'8']);
			$form->addField('select',['name'=>'status','class'=>'form-control', 'title'=>'Виберіть статус 0-неактивний 1-активний', 'option_values'=>[0, 1]]);
			$form->addField('submit',['name'=>'submit', 'value' =>'Редагувати','class'=>'btn btn-primary btn-lg btn-block']);
			$data=$form->createForm();
			$this->render('app/views/admin/adminRoom.php',$data);
		}
		public function delete($id){
			$objRev=new ReviewsModelRepository;
			$objDb=$objRev->getObjDb($objRev->getTable());
			$objDb->delById($id);
			header('refresh: 0; url = http://localhost/reviews/see/'.$_SESSION['page']);
		}
		public function update(){
			$request = new Request;
			$post = $request->getParams();
			$data=[];
			$data['id']=$_SESSION['reviewId'];
			unset($_SESSION['reviewId']);
			$data['user_name']=$post['name'];
			$data['review']=$post['review'];
			$data['status']=$post['status'];
			$objRev=new ReviewsModelRepository;
			$objDb=$objRev->getObjDb($objRev->getTable());
			$objDb->save($objRev->set($data));
			header('refresh: 0; url = http://localhost/reviews/see/'.$_SESSION['page']);
		}
		public function activate($id){
			$data['id']=$id;
			$data['status']=1;
			$objRev=new ReviewsModelRepository;
			$objDb=$objRev->getObjDb($objRev->getTable());
			$objDb->save($objRev->set($data));
			header('refresh: 0; url = http://localhost/reviews/see/'.$_SESSION['page']);
		}
	}
?>