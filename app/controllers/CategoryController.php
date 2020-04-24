<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Request;
	use Framework\FormBuilder;
	use Framework\Paginator;
	use App\Models\CategoryModelRepository;

	class CategoryController extends Controller{
		private $idForm='addCat';
		private $page;
		public function add(){
			$form = new FormBuilder;
			$form->setAction('http://localhost/category/save');
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
				if($value==$post['newCat'] && isset($_SESSION['categories']['id']) != false){
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
				if(isset($_SESSION['category']['id'])){
					$arr['id']=$_SESSION['category']['id'];
				}
				if($post['parentCat']=='Головна'){
					$arr['parent_id']=0;
				}
				else{
					$arr['parent_id']=$data[0]['id'];
				}
				$arr['name']=$post['newCat'];
				$objDb->save($catModel->set($arr));
				unset($_SESSION['category']);
				unset($_SESSION['values']['form'][$this->idForm]);
				header('refresh: 0; url = http://localhost/category/see/'.$_SESSION['page']);
			}
		}

		public function see($page){
			$_SESSION['page']=$page;
			$onPage=5;
			$catModel=new CategoryModelRepository;
			$categories=$catModel->getItems();
			$objDb=$catModel->getObjDb($catModel->getTable());
			$result=$objDb->getColumns();
			$columns = array();
			foreach($result as $value) {
				$columns[] = $value['Field'];
			}
			$data='<table class="table">';
			$data.= '<tr>';
			foreach ($columns as $elem){
				$data.= '<th>'. $elem .'</th>';
			}
			$data.= "<th>видалити</th>";
			$data.= "<th>редагувати</th>";
			$data.= '</tr>';
			$arr=array_chunk($categories, $onPage);
			for($tr=0; $tr<$onPage; $tr++) {
				if(isset($arr[$page-1][$tr])){
					$data.= '<tr>';
					for ($td=0; $td<count($columns); $td++){ 
						$function='get'.ucfirst($columns[$td]);
						$data.= '<td>'. $arr[$page-1][$tr]->$function() .'</td>';
					}
					$id=$arr[$page-1][$tr]->getId() * 1;
					$data.= '<td>'.'<a href="http://localhost/category/delete/'.$id.'">'.'видалити'.'</a>'.'</td>';
					$data.= '<td>'.'<a href="http://localhost/category/edit/'.$id.'">'.'редагувати'.'</a>'.'</td>';
					$data.= '</tr>';
				}
			}
			$data.='</table>';
			$data.='<a href="http://localhost/category/add"><h2>Додати категорію</h2></a>';
			$pagin=new Paginator;
			$pagin->setOnPage($onPage);
			$pagin->setItems($categories);
			$pagin->setMaxLi(5);
			$data.=$pagin->getPagination();
			$this->render('app/views/ViewSeeCategory.php',$data);
		}

		public function delete($id){
			$catModel=new CategoryModelRepository;
			$objDb=$catModel->getObjDb($catModel->getTable());
			$objDb->delById($id);
			header('refresh: 0; url = http://localhost/category/see/'.$_SESSION['page']);
		}

		public function edit($id){
			$catModel=new CategoryModelRepository;
			$objDb=$catModel->getObjDb($catModel->getTable());
			$data=$objDb->getByParam('id',$id);
			$catName=$data[0]['name'];
			$parentId=$data[0]['parent_id'];
			$data=$objDb->getByParam('id',$parentId);
			if(isset($data[0]['name'])){
				$parentCatName=$data[0]['name'];
				$_SESSION['values']['form'][$this->idForm]['parentCat']=$parentCatName;
			}
			$_SESSION['category']['id']=$id;
			$_SESSION['values']['form'][$this->idForm]['newCat']=$catName;
			return $this->add();
		}

	}
?>