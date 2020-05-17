<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Mailer;
	use Framework\FormBuilder;
	use Framework\Paginator;
	use Framework\Filesystem\Api\FileUploader;
	use App\Models\UsersModelRepository;
	class UserController extends FrontController{
		private $page;

		public function see(int $page){
			$_SESSION['page']=$page;
			$data=[];
			$data['onPage']=10;
			$userModel=new UsersModelRepository;
			$objDb=$userModel->getObjDb($userModel->getTable());
			$countUsers=$objDb->getCount();
			$from=($page-1) * $data['onPage'];
			$data['users']=$userModel->getLimitItems($from, $data['onPage']);
			$pagin=new Paginator;
			$pagin->setOnPage($data['onPage']);
			$pagin->setCountItems($countUsers['count']);
			$pagin->setMaxLi(5);
			$data['pagin']=$pagin->getPagination();
			$this->render('app/views/admin/users.php',$data);
		}

		public function account(){
			if (!isset($_SESSION['login'])){
				$_SESSION['auth']=false;
				$_SESSION['login']=$_SERVER['REMOTE_ADDR'];
			}
			$objUser= new UsersModelRepository;
			$user=$objUser->getItemByParam('login', $_SESSION['login']);
			if(!empty($user)){
				$privileges=$user[0]->getPrivileges();
			}
			if ($_SESSION['auth']){
				if(isset($privileges)&&$privileges=='admin'){
					$this->render('app/views/admin/adminRoom.php', null);
				}
				else{
					$this->render('app/views/user/account.php', null);
				}
			}
			else{
				header("refresh: 0; url = http://localhost/user/register");
			}
		}

		public function register(){
			$form = new FormBuilder;
			//$form->setEncode('multipart/form-data');
			$form->setAction('http://localhost/user/save');
			$form->setId('reg');
			$form->setMethod('POST');
			$form->setClass('');
			
			$form->addField('text',['name'=>'name','class'=>'form-control','placeholder'=>'Ім\'я']);
			$form->addField('text',['name'=>'surname','class'=>'form-control','placeholder'=>'Фамілія']);
			$form->addField('tel',['name'=>'phone','class'=>'form-control','placeholder'=>'Телефон', 'pattern'=>'[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}']);
			$form->addField('email',['name'=>'email','class'=>'form-control','placeholder'=>'Email']);
			$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Login']);
			$form->addField('password',['minlength'=>'6','maxlength'=>'25', 'name'=>'password','class'=>'form-control', 'placeholder'=>'Пароль']);
			//$form->addField('file',['name'=>'myFile','class'=>'form-control']);
			$form->addField('submit',['name'=>'submit', 'value' =>'Зареєструватись','class'=>'btn btn-primary btn-lg btn-block']);

			$data=$form->createForm();
			if(isset($_SESSION['errors']['form']['reg'])){
				unset($_SESSION['errors']['form']['reg']);
			}
			$_SESSION['refferer']=$_SERVER['HTTP_REFERER'];
			$this->render('app/views/user/register.php',$data);
		}

		public function save(){
			$request=$this->getRequest();
			$data=$request->getParams();
			unset($data['submit']);
			$_SESSION['values']['form']['reg']=$data;
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			if(!empty($data)){
				if(empty($data['login'])){
					$_SESSION['errors']['form']['reg']['login']['empty_fields']='<pre style="background-color: #F6CEEC">Заповніть це поле!  ↑↑↑</pre>';
				}
				if(empty($data['email'])){
					$_SESSION['errors']['form']['reg']['email']['empty_fields']='<pre style="background-color: #F6CEEC">Заповніть це поле!  ↑↑↑</pre>';
				}
				if(empty($data['password'])){
					$_SESSION['errors']['form']['reg']['password']['empty_fields']='<pre style="background-color: #F6CEEC">Заповніть це поле!  ↑↑↑</pre>';
				}
				if(!empty($data['login']) && !empty($data['email'])){
					$userIsset=$db->getByParam('login',$data['login']);
					$emailIsset=$db->getByParam('email',$data['email']);
				}
				if(!empty($userIsset)){
					$_SESSION['errors']['form']['reg']['login']='<pre style="background-color: #F6CEEC">Вже існує юзер з таким логіном!  ↑↑↑</pre>';
				}
				if(!empty($emailIsset)){
					$_SESSION['errors']['form']['reg']['email']='<pre style="background-color: #F6CEEC">Вже існує юзер з таким імейлом!  ↑↑↑</pre>';
				}
			}
			if (empty($_SESSION['errors']['form']['reg']) && !empty($data)){
				unset($_SESSION['errors']['form']['reg']);
				unset($_SESSION['values']['form']['reg']);
				$data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
				$db->save($user->set($data));
				$_SESSION['login']=$data['login'];
				$mail=new Mailer;
				$mail->sendMail($data['email'], 'Завершення реєстрації', 'Для завершення реєстрації перейдіть по <a href="http://localhost/user/confirmemail/'.$data['login'].'">посиланню</a>');
				echo '<h3>Вітаємо! Щоб завершити реєстрацію-перейдіть по посиланню, яке відправлено Вам на email .</h3>';
				header('refresh: 3; url = '.$_SESSION['refferer']);
			}
			if (!empty($_SESSION['errors']['form']['reg'])) {
				header("refresh: 0.01; url = http://localhost/user/register");
			}

			/*$files=$request->getFile();
			if(!empty($files)){
				$arr=['image/jpeg'];
				$fileUp=new FileUploader;
				$fileUp->setFile($files['myFile']['tmp_name']);
				$fileUp->setOrigName($files['myFile']['name']);
				$fileUp->setDir('D:\Programs\htdocs\framework\Filesystem\Files');
				$fileUp->addAllowedFormats($arr);
				$size=$fileUp->getSize();
				$fileUp->setMaxSize(24);
				$mime=$fileUp->getMimeType();
				$fileUp->uploadFile();
			}*/

		}

		public function login(){
			$form = new FormBuilder;
			$form->setAction('http://localhost/user/confirmLogin');
			$form->setId('login');
			$form->setMethod('POST');
			$form->setClass('');
			
			$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Логін']);
			$form->addField('password',['maxlength'=>'25', 'name'=>'password', 'class'=>'form-control', 'placeholder'=>'Пароль']);
			$form->addField('submit',['name'=>'submit', 'value'=>'Увійти', 'class'=>'btn btn-primary btn-lg btn-block']);
			
			$data=$form->createForm();
			if(isset($_SESSION['errors']['form']['login'])){
				unset($_SESSION['errors']['form']['login']);
			}
			$_SESSION['refferer']=$_SERVER['HTTP_REFERER'];
			$this->render('app/views/user/login.php',$data);
		}

		public function confirmLogin(){
			$request=$this->getRequest();
			$data=$request->getParams();
			unset($data['submit']);
			if(!empty($data)){
				$_SESSION['values']['form']['login']=$data;
			}
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			if(!empty($data['login'])){
				$userIsset=$db->getByParam('login',$data['login']);
			}
			else{
				$_SESSION['errors']['form']['login']['login']['empty_fields']='<pre style="background-color: #F6CEEC">Заповніть це поле!  ↑↑↑</pre>';
			}
			if(empty($data['password'])){
				$_SESSION['errors']['form']['login']['password']['empty_fields']='<pre style="background-color: #F6CEEC">Заповніть це поле!  ↑↑↑</pre>';
			}
			if(empty($userIsset) && !empty($data['password'])){
				$_SESSION['errors']['form']['login']['login']='<pre style="background-color: #F6CEEC">Користувача з таким логіном не існує!</pre>';
			}
			elseif(password_verify ( $data['password'] , $userIsset[0]['password'] ) ) {
				$_SESSION['login']=$data['login'];
				$_SESSION['auth']=true;
				unset($_SESSION['errors']['form']['login']);
				unset($_SESSION['values']['form']['login']);
				echo '<h2>Вітаємо '.$_SESSION['login'].'!';
				header('refresh: 2; url = '.$_SESSION['refferer']);
			}
			else{
				$_SESSION['errors']['form']['login']['password']='<pre style="background-color: #F6CEEC">Невірний пароль!</pre>';
			}
			if (!empty($_SESSION['errors']['form']['login'])) {
				header("refresh: 0; url = http://localhost/user/login");
			}
		}

		public function confirmEmail($login){
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			$data=$db->getByParam('login',$login);
			if($data){
				$data[0]['confirm']=1;
				$db->save($user->set($data[0]));
				$_SESSION['login']=$data[0]['login'];
				$data= '<p>Ура , ви завершили реєстрацію!</p>
				<p><a href="http://localhost/cabinet">Перейти</a> у кабінет<br></p>
				<p><a href="http://localhost/index.php">Перейти</a> на головну</p>
				<p><a href="http://localhost/user/logout">Вийти</a></p>';
			}
			$this->render('app/views/user/confirmEmail.php',$data);
		}

		public function logout(){
			$_SESSION['auth']=false;
			unset($_SESSION['login']);
			unset($_SESSION['refferer']);
			unset($_SESSION['errors']['form']['reg']);
			unset($_SESSION['errors']['form']['login']);
			unset($_SESSION['values']['form']['reg']);
			unset($_SESSION['values']['form']['login']);
			header('Location: http://localhost/products/see/0/1');
		}

		public function block($id){
			$data=[];
			$data['id']=$id;
			$data['block']=1;
			$userModel=new UsersModelRepository;
			$userObj=$userModel->set($data);
			$objDb=$userModel->getObjDb($userModel->getTable());
			$objDb->save($userObj);
			header('refresh: 0; url = http://localhost/user/see/'.$_SESSION['page']);
		}

		public function delete($id){
			$usrModel=new UsersModelRepository;
			$objDb=$usrModel->getObjDb($usrModel->getTable());
			$objDb->delById($id);
			header('refresh: 0; url = http://localhost/user/see/'.$_SESSION['page']);
		}
	}
?>