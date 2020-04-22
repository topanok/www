<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Request;
	use Framework\FormBuilder;
	use App\Models\CategoryModelRepository;

	class CategoryController extends Controller{
		private $idForm='addCat';
		public function add(){
			$form = new FormBuilder;
			if(isset($_SESSION['values']['form'][$this->idForm])){
				$form->setAction('http://localhost/category/update');
			}
			else{
				$form->setAction('http://localhost/category/save');
			}
			$form->setId($this->idForm);
			$form->setMethod('POST');
			$form->setClass('');
			
			$form->addField('text',['name'=>'newCat','class'=>'form-control','placeholder'=>'Нова категорія']);
			$form->addField('select',['name'=>'parentCat','class'=>'form-control', 'title'=>'Виберіть до якої категорії належить нова категорія', 'option_values'=>$this->getCategories()]);
			$form->addField('submit',['name'=>'submit', 'value' =>'Надіслати','class'=>'btn btn-primary btn-lg btn-block']);

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
			$catsName[0]='Головна';
			for ($i=0; $i<count($categories); $i++) {
				$catsName[]=$categories[$i]->getName();
			}
			return $catsName;
		}

		public function save(){
			$request = new Request;
			$post = $request->getParams();
			unset($post['submit']);
			$catsName=$this->getCategories();
			if(empty($post['newCat'])){
				$_SESSION['errors']['form'][$this->idForm]['newCat']['empty_fields']='<pre style="background-color: #F6CEEC">Заповніть це поле!  ↑↑↑</pre>';
			}
			foreach($catsName as $value){
				if($value==$post['newCat']){
					$_SESSION['errors']['form'][$this->idForm]['newCat']='<pre style="background-color: #F6CEEC">Вже існує така категорія!  ↑↑↑</pre>';
				}
			}
			if (!empty($_SESSION['errors']['form'][$this->idForm])) {
				header("refresh: 0.01; url = http://localhost/category/add");
			}
			else{
				$catModel=new CategoryModelRepository;
				$objDb=$catModel->getObjDb($catModel->getTable());
				$data=$objDb->getByParam('name',$post['parentCat']);
				$arr=[];
				if($post['parentCat']=='Головна'){
					$arr['parent_id']=0;
				}
				else{
					$arr['parent_id']=$data[0]['id'];
				}
				$arr['name']=$post['newCat'];
				$objDb->save($catModel->set($arr));
				echo '<h1>Катерорія успішно створена!</h1>';
				header("refresh: 3; url = http://localhost/category/add");
			}
		}

		public function seeCategory(){
			$catModel=new CategoryModelRepository;
			$categories=$catModel->getItems();
			$objDb=$catModel->getObjDb($catModel->getTable());
			$result=$objDb->getColumns();
			$columns = array();
			foreach($result as $value) {
				$columns[] = $value['Field'];
			}
			$data='';
			$data.= '<tr>';
			foreach ($columns as $elem){
				$data.= '<th>'. $elem .'</th>';
			}
			$data.= "<th>видалити</th>";
			$data.= "<th>редагувати</th>";
			$data.= '</tr>';
			for ($tr=0; $tr<count($categories); $tr++){ 
				$data.= '<tr>';
				for ($td=0; $td<count($columns); $td++){ 
					$function='get'.ucfirst($columns[$td]);
					$data.= '<td>'. $categories[$tr]->$function() .'</td>';
				}
				$id=$categories[$tr]->getId() * 1;
				$data.= '<td>'.'<a href="http://localhost/category/delete/'.$id.'">'.'видалити'.'</a>'.'</td>';
				$data.= '<td>'.'<a href="http://localhost/category/edit/'.$id.'">'.'редагувати'.'</a>'.'</td>';
				$data.= '</tr>';
			}
			$this->render('app/views/ViewSeeCategory.php',$data);
		}

		public function delete($id){
			$catModel=new CategoryModelRepository;
			$objDb=$catModel->getObjDb($catModel->getTable());
			$objDb->delById($id);
			echo 'Успіх!';
			header("refresh: 3; url = http://localhost/category/seecategory");
		}

		public function edit($id){
			$catModel=new CategoryModelRepository;
			$objDb=$catModel->getObjDb($catModel->getTable());
			$data=$objDb->getByParam('id',$id);
			$_SESSION['categories']['id']=$id;
			$_SESSION['values']['form'][$this->idForm]['newCat']=$data[0]['name'];
			return $this->add();
		}

		public function update(){
			$request = new Request;
			$post = $request->getParams();
			unset($post['submit']);
			$catModel=new CategoryModelRepository;
			$objDb=$catModel->getObjDb($catModel->getTable());
			$data=$objDb->getByParam('name',$post['parentCat']);
			$arr=[];
			$arr['id']=$_SESSION['categories']['id'];
			if($post['parentCat']=='Головна'){
				$arr['parent_id']=0;
			}
			else{
				$arr['parent_id']=$data[0]['id'];
			}
			$arr['name']=$post['newCat'];
			$objDb->save($catModel->set($arr));
			unset($_SESSION['categories']);
			unset($_SESSION['values']['form'][$this->idForm]);
			echo '<h1>Катерорія успішно відредагована!</h1>';
			header("refresh: 3; url = http://localhost/category/seecategory");
		}

	}
?>