<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Mailer;
	use Framework\FormBuilder;
	use Framework\Filesystem\Api\FileUploader;
	use App\Models\UsersModelRepository;
	
	class UserController extends Controller{

		public function register(){
			$form = new FormBuilder;
			//$form->setEncode('multipart/form-data');
			$form->setAction('http://localhost/user/save');
			$form->setId('reg');
			$form->setMethod('POST');
			$form->setClass('');
			
			$form->addField('text',['name'=>'name','class'=>'form-control','placeholder'=>'Ім\'я']);
			$form->addField('text',['name'=>'surname','class'=>'form-control','placeholder'=>'Фамілія']);
			$form->addField('email',['name'=>'email','class'=>'form-control','placeholder'=>'Email']);
			$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Login']);
			$form->addField('password',['minlength'=>'8','maxlength'=>'25', 'name'=>'password','class'=>'form-control', 'placeholder'=>'Пароль']);
			//$form->addField('file',['name'=>'myFile','class'=>'form-control']);
			$form->addField('submit',['name'=>'submit', 'value' =>'Зареєструватись','class'=>'btn btn-primary btn-lg btn-block']);

			$data=$form->createForm();
			if(isset($_SESSION['errors']['form']['reg'])){
				unset($_SESSION['errors']['form']['reg']);
			}
			$this->render('app/views/ViewRegister.php',$data);
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
				$mail=new Mailer;
				$mail->sendMail($data['email'], 'Завершення реєстрації', 'Для завершення реєстрації перейдіть по <a href="http://localhost/user/confirmemail/'.$data['login'].'">посиланню</a>');
				echo '<h3>Вітаємо! Щоб завершити реєстрацію-перейдіть по посиланню, яке відправлено Вам на email .</h3>';
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
			$this->render('app/views/ViewLogin.php',$data);
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
			elseif(password_verify ( $data['password'] , $userIsset[0]['password'] ) ) {					$_SESSION['login']=$data['login'];
				unset($_SESSION['errors']['form']['login']);
				unset($_SESSION['values']['form']['login']);
				echo '<h3>Вітаємо '.$userIsset[0]['name'].' ! Ви увійшли як '.$data['login'].'.</h3>';
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
			$this->render('app/views/ViewConfirmEmail.php',$data);
		}

		public function logout(){
			unset($_SESSION['login']);
			unset($_SESSION['errors']['form']['reg']);
			unset($_SESSION['errors']['form']['login']);
			unset($_SESSION['values']['form']['reg']);
			unset($_SESSION['values']['form']['login']);
			header('Location: http://localhost/index.php');
		}
	}
?>