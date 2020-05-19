<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Mailer;
	use Framework\Request;
	use Framework\FormBuilder;
	use Framework\Paginator;
	use App\Models\ProductModelRepository;
	use App\Models\CategoryModelRepository;
	use App\Models\ReviewsModelRepository;
	use App\Models\UsersModelRepository;
	use Framework\Filesystem\Api\FileUploader;

	class ProductController extends FrontController{
		private $idForm='addProd';

		public function add(){
			$form = new FormBuilder;
			$form->setEncode('multipart/form-data');
			$form->setAction('http://localhost/product/save');
			$form->setId($this->idForm);
			$form->setMethod('POST');
			$form->setClass('');
			
			$form->addField('text',['name'=>'name','class'=>'form-control','placeholder'=>'Назва продукту']);
			$form->addField('textarea',['name'=>'description','class'=>'form-control','placeholder'=>'Опис']);
			$form->addField('textarea',['name'=>'properties','class'=>'form-control','placeholder'=>'Характеристики']);
			$form->addField('text',['name'=>'price','class'=>'form-control','placeholder'=>'Ціна']);
			$form->addField('text',['name'=>'count','class'=>'form-control','placeholder'=>'Кількість']);
			$form->addField('select',['name'=>'category','class'=>'form-control', 'title'=>'Виберіть до якої категорії належить продукт', 'option_values'=>$this->getCategories()]);
			$form->addField('file',['name'=>'myFile','class'=>'form-control']);
			$form->addField('submit',['name'=>'submit', 'value' =>'Надіслати','class'=>'btn btn-primary btn-lg btn-block']);

			$data=$form->createForm();
			if(isset($_SESSION['errors']['form'][$this->idForm])){
				unset($_SESSION['errors']['form'][$this->idForm]);
			}
			$this->render('app/views/admin/addProduct.php',$data);
		}
		public function save(){
			$request = new Request;
			$post = $request->getParams();
			unset($post['submit']);
			$_SESSION['values']['form'][$this->idForm]=$post;
			$keys=array_keys($post);
			for($i=0; $i < count($keys); $i++){
				if(empty($post[$keys[$i]])){
					$_SESSION['errors']['form'][$this->idForm][$keys[$i]]['empty_fields']='<pre style="background-color: #F6CEEC">Заповніть це поле!  ↑↑↑</pre>';
				}
			}
			if (!empty($_SESSION['errors']['form'][$this->idForm])) {
				header("refresh: 1; url = http://localhost/product/add");
			}
			else{
				$catModel=new CategoryModelRepository;
				$objDb=$catModel->getObjDb($catModel->getTable());
				$data=$objDb->getByParam('name',$post['category']);
				$arr=[];
				if(isset($_SESSION['product']['id'])){
					$arr['id']=$_SESSION['product']['id'];
				}
				if($post['category']=='Головна'){
					$arr['category_id']=0;
				}
				else{
					$arr['category_id']=$data[0]['id'];
				}
				unset($keys[count($keys) - 1]);
				for($i=0; $i < count($keys); $i++){
					$arr[$keys[$i]]=$post[$keys[$i]];
				}
				$files=$request->getFile();
				if(!empty($files)){
					$arr['images']=$files['myFile']['name'];
				}
				$prodModel=new ProductModelRepository;
				$objDb=$prodModel->getObjDb($prodModel->getTable());
				$objDb->save($prodModel->set($arr));
				unset($_SESSION['errors']['form'][$this->idForm]);
				unset($_SESSION['values']['form'][$this->idForm]);
				unset($_SESSION['product']['id']);
				header('refresh: 0; url = http://localhost/product/see/'.$_SESSION['page']);
			}
		}

		public function saveReview(){
			$request = new Request;
			$post = $request->getParams();
			$post['user_ip']=$_SERVER['REMOTE_ADDR'];
			$columns=['user_ip', 'product_id'];
			$values=[$post['user_ip'], $post['product_id']];
			$objRew = new ReviewsModelRepository;
			$review=$objRew->getItemsByParams($columns , $values);
			if(empty($review)){
				$objRew->set($post);
				$objDb=new Db($objRew->getTable());
				$objDb->save($objRew->set($post));
				$objUser=new UsersModelRepository;
				$admins=$objUser->getItemByParam('privileges' , 'admin');
				echo'<div class="toch-review-title"><pre style="background-color: #E0F2F7">Ваш відгук незабаром тут з\'явиться!</pre></div>';
				/*$mail=new Mailer;
				foreach ($admins as $admin) {
					$mail->sendMail($admin->getEmail(), 'Новий відгук!', 'Додано новий відгук , перейдіть в адмінку, щоб його опублікувати <a href="http://localhost/user/account">перейти</a>');
				}*/
			}
		}

		public function see(int $page){
			$_SESSION['page']=$page;
			$data=[];
			$data['page']=$page;
			$data['onPage']=10;
			$prodModel=new ProductModelRepository;
			$objDb=$prodModel->getObjDb($prodModel->getTable());
			$from=($page-1) * $data['onPage'];
			$countProd=$objDb->getCount();
			$data['products']=$prodModel->getLimitItems($from, $data['onPage']);
			$result=$objDb->getColumns();
			$data['columns'] = array();
			foreach($result as $value) {
				$data['columns'][] = $value['Field'];
			}
			$pagin=new Paginator;
			$pagin->setOnPage($data['onPage']);
			$pagin->setCountItems($countProd['count']);
			$pagin->setMaxLi(5);
			$data['pagin']=$pagin->getPagination();
			$this->render('app/views/admin/tableProducts.php',$data);
		}

		public function details($id){
			if (!isset($_SESSION['login'])){
				$_SESSION['auth']=false;
				$_SESSION['login']=$_SERVER['REMOTE_ADDR'];
			}
			$columns=['user_ip', 'product_id'];
			$values=[$_SERVER['REMOTE_ADDR'], $id];
			$objRew = new ReviewsModelRepository;
			$review=$objRew->getItemsByParams($columns , $values);
			if(!empty($review)){
				$data['reviewIsset']=true;
			}
			$prodModel=new ProductModelRepository;
			$objDb=$prodModel->getObjDb($prodModel->getTable());
			$data['product']=$objDb->getById($id);
			//data for reviews
			$objDb = new Db($objRew->getTable());
			$columns = ['product_id', 'status'];
			$values = [$id, 1];
			$data['reviews'] = $objDb->getByParams($columns, $values);
			if(!empty($data['reviews'])){
				$ratingSum = 0;
				foreach ($data['reviews'] as $review) {
					$ratingSum += $review['rating'];
				}
				$data['reviewsCount']=count($data['reviews']);
				$data['averageRating'] = floor($ratingSum / count($data['reviews']));
			}else{
				$data['reviewsCount']=0;
				$data['averageRating']=0;
			}
			if($_SESSION['login'] != $_SERVER['REMOTE_ADDR']){
				$objUser = new UsersModelRepository;
				$user = $objUser->getItemByParam('login' , $_SESSION['login']);
				$data['userName'] = $user[0]->getName();
			}
			$this->render('app/views/app/productDetails.php',$data);
		}

		public function edit($idForEdit){
			$_SESSION['product']['id']=$idForEdit;
			$prodModel=new ProductModelRepository;
			$products=$prodModel->getItems();

			$catModel=new CategoryModelRepository;
			$objDb=$catModel->getObjDb($catModel->getTable());
	
			for($i=0; $i<count($products); $i++){
				$id=$products[$i]->getId();
				if ($id == $idForEdit){
					$catId=$products[$i]->getCategory_id();
					$data=$objDb->getByParam('id',$catId);
					$catName=$data[0]['name'];
					$_SESSION['values']['form'][$this->idForm]=$products[$i]->getData();
					$_SESSION['values']['form'][$this->idForm]['category']=$catName;
				}
			}
     		return $this->add();
		}

		public function delete($id){
			$prodModel=new ProductModelRepository;
			$objDb=$prodModel->getObjDb($prodModel->getTable());
			$objDb->delById($id);
			echo '<h1>Видалено!</h1>';
			header('refresh: 1; url = http://localhost/product/see/'.$_SESSION['page']);
		}

		private function getCategories(){
			$catModel=new CategoryModelRepository;
			$categories=$catModel->getItems();
			$catsName=[];
			$catsName[0]='Головна';
			for ($i=0; $i<count($categories); $i++) {
				$catsName[]=$categories[$i]->getName();
			}
			return $catsName;
		}
	}
?>