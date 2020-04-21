<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Request;
	use Framework\FormBuilder;
	use App\Models\CategoryModelRepository;

	class AddCategoryController extends Controller{
		private $idForm='addCat';
		public function add(){
			$form = new FormBuilder;
			$form->setAction('http://localhost/addcategory/save');
			$form->setId($this->idForm);
			$form->setMethod('POST');
			$form->setClass('');
			
			$form->addField('text',['name'=>'newCat','class'=>'form-control','placeholder'=>'Нова категорія']);
			$form->addField('select',['name'=>'parentCat','class'=>'form-control','option_values'=>$this->getCategories()]);
			$form->addField('submit',['name'=>'submit', 'value' =>'Додати','class'=>'btn btn-primary btn-lg btn-block']);

			$data=$form->createForm();
			if(isset($_SESSION['errors']['form'][$this->idForm])){
				unset($_SESSION['errors']['form'][$this->idForm]);
			}
			$this->render('app/views/ViewAddCategory.php',$data);
		}

		private function getCategories(){
			$catModel=new CategoryModelRepository;
			$categories=$catModel->getItems();
			$catsName=[];
			for ($i=0; $i<count($categories); $i++) {
				$catsName[]=$categories[$i]->getName();
			}
			return $catsName;
		}

		public function save(){
			$categories=$this->getCategories();
			$request = new Request;
			$post = $request->getParams();
			unset($post['submit']);
			if(empty($post['newCat'])){
				$_SESSION['errors']['form'][$this->idForm]['newCat']['empty_fields']='<pre style="background-color: #F6CEEC">Заповніть це поле!  ↑↑↑</pre>';
			}
			else{
				foreach($categories as $value){
					if($value==$post['newCat']){
						$_SESSION['errors']['form'][$this->idForm]['newCat']='<pre style="background-color: #F6CEEC">Вже існує така категорія!  ↑↑↑</pre>';
					}
				}
			}
			if (!empty($_SESSION['errors']['form'][$this->idForm])) {
				header("refresh: 0.01; url = http://localhost/addcategory/add");
			}
			else{
				$catModel=new CategoryModelRepository;
				$objDb=$catModel->getObjDb($catModel->getTable());
				$data=$objDb->getByParam('name',$post['parentCat']);
				$arr=[];
				$arr['parent_id']=$data[0]['id'];
				$arr['name']=$post['newCat'];
				$objDb->save($catModel->set($arr));
				echo '<h1>Катерорія успішно створена!</h1>';
				header("refresh: 3; url = http://localhost/addcategory/add");
			}
		}
	}
?>