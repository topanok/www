<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Db;
	use Framework\Mailer;
	use Framework\FormBuilder;
	use App\Models\UsersModelRepository;
	
	class UserController extends Controller{

		public function register(){
			$form = new FormBuilder;
			$form->setAction('http://localhost/user/save');
			$form->setId('reg');
			$form->setMethod('POST');
			$form->setClass('');
			$data=$form->startForm();
			if(!empty($_SESSION['values']['form']['reg'])){
				$data.=$form->addField('text',['name'=>'name','class'=>'form-control','placeholder'=>'Ім\'я', 'value'=>$_SESSION['values']['form']['reg']['name']]);
				$data.=$form->addField('text',['name'=>'surname','class'=>'form-control','placeholder'=>'Фамілія', 'value'=>$_SESSION['values']['form']['reg']['surname']]);
				$data.=$form->addField('email',['name'=>'email','class'=>'form-control','placeholder'=>'Email', 'value'=>$_SESSION['values']['form']['reg']['email']]);
				$data.=$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Login', 'value'=>$_SESSION['values']['form']['reg']['login']]);
			}
			else{
				$data.=$form->addField('text',['name'=>'name','class'=>'form-control','placeholder'=>'Ім\'я']);
				$data.=$form->addField('text',['name'=>'surname','class'=>'form-control','placeholder'=>'Фамілія']);
				$data.=$form->addField('email',['name'=>'email','class'=>'form-control','placeholder'=>'Email']);
				$data.=$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Login']);
			}
			$data.=$form->addField('password',['minlength'=>'8','maxlength'=>'25', 'name'=>'password','class'=>'form-control', 'placeholder'=>'Пароль']);
			if (isset($_SESSION['errors']['form']['reg']['empty_fields'])){
				$data.=$_SESSION['errors']['form']['reg']['empty_fields'];
			}
			$data.=$form->addField('submit',['name'=>'submit', 'value' =>'Зареєструватись','class'=>'btn btn-primary btn-lg btn-block']);
			$data.=$form->endForm();
			if(isset($_SESSION['errors']['form']['reg'])){
				unset($_SESSION['errors']['form']['reg']);
			}
			$this->render('app/views/ViewRegister.php',$data);
		}

		public function save(){
			$request=$this->getRequest();
			$data=$request->getParams();
			$_SESSION['values']['form']['reg']=$data;
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			if(!empty($data)){
				if(empty($data['login']) || empty($data['email']) || empty($data['password'])){
					$_SESSION['errors']['form']['reg']['empty_fields']='<pre style="background-color: #F6CEEC">Заповніть всі поля!</pre>';
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
				header("refresh: 0.1; url = http://localhost/user/register");
			}
		}

		public function login(){
			$form = new FormBuilder;
			$form->setAction('http://localhost/user/confirmLogin');
			$form->setId('login');
			$form->setMethod('POST');
			$form->setClass('');
			$data=$form->startForm();
			if(!empty($_SESSION['values']['form']['login'])){
				$data.=$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Логін', 'value'=>$_SESSION['values']['form']['login']['login'] ]);
			}
			else{
				$data.=$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Логін']);
			}
			$data.=$form->addField('password',['maxlength'=>'25', 'name'=>'password', 'class'=>'form-control', 'placeholder'=>'Пароль']);
			
			if (isset($_SESSION['errors']['form']['login']['empty_fields'])){
				$data.=$_SESSION['errors']['form']['login']['empty_fields'];
			}
			$data.=$form->addField('submit',['name'=>'submit', 'value'=>'Увійти', 'class'=>'btn btn-primary btn-lg btn-block']);
			$data.=$form->endForm();
			if(isset($_SESSION['errors']['form']['login'])){
				unset($_SESSION['errors']['form']['login']);
			}
			$this->render('app/views/ViewLogin.php',$data);
		}

		public function confirmLogin(){
			$request=$this->getRequest();
			$data=$request->getParams();
			$_SESSION['values']['form']['login']=$data;
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			if(!empty($data)){
				if(!empty($data['login']) && !empty($data['password'])){
					$userIsset=$db->getByParam('login',$data['login']);
					if(!empty($userIsset)){
						if(password_verify ( $data['password'] , $userIsset[0]['password'] ) ) {
							$_SESSION['login']=$data['login'];
							unset($_SESSION['errors']['form']['login']);
							unset($_SESSION['values']['form']['login']);
							echo '<h3>Вітаємо '.$userIsset[0]['name'].' ! Ви увійшли як '.$data['login'].'.</h3>';
						}
						else{
							$_SESSION['errors']['form']['login']['password']='<pre style="background-color: #F6CEEC">Невірний пароль!</pre>';
						}
					}
					else{
						$_SESSION['errors']['form']['login']['login']='<pre style="background-color: #F6CEEC">Користувача з таким логіном не існує!</pre>';
					}
				}
				else{
					$_SESSION['errors']['form']['login']['empty_fields']='<pre style="background-color: #F6CEEC">Заповніть всі поля!</pre>';
				}
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
			unset($_SESSION['values']['form']['reg']);
			header('Location: http://localhost/index.php');
		}
	}
?>