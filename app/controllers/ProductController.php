<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Request;
	use Framework\FormBuilder;
	use Framework\Paginator;
	use App\Models\ProductModelRepository;
	use App\Models\CategoryModelRepository;
	use Framework\Filesystem\Api\FileUploader;

	class ProductController extends Controller{
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
			$this->render('app/views/ViewAddProduct.php',$data);
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

		public function see(int $page){

			$_SESSION['page']=$page;
			$onPage=5;
			$prodModel=new ProductModelRepository;
			$products=$prodModel->getItems();
			$objDb=$prodModel->getObjDb($prodModel->getTable());
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
			$arr=array_chunk($products, $onPage);
			for($tr=0; $tr<$onPage; $tr++) {
				if(isset($arr[$page-1][$tr])){
					$data.= '<tr>';
					for ($td=0; $td<count($columns); $td++){ 
						$function='get'.ucfirst($columns[$td]);
						$data.= '<td>'. $arr[$page-1][$tr]->$function() .'</td>';
					}
					$id=$arr[$page-1][$tr]->getId() * 1;
					$data.= '<td>'.'<a href="http://localhost/product/delete/'.$id.'">'.'видалити'.'</a>'.'</td>';
					$data.= '<td>'.'<a href="http://localhost/product/edit/'.$id.'">'.'редагувати'.'</a>'.'</td>';
					$data.= '</tr>';
				}
			}
			$data.='</table>';
			$data.='<a href="http://localhost/product/add"><h2>Додати продукт</h2></a>';
			$pagin=new Paginator;
			$pagin->setOnPage($onPage);
			$pagin->setItems($products);
			$pagin->setMaxLi(5);
			$data.=$pagin->getPagination();
			$this->render('app/views/ViewTableProducts.php',$data);
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