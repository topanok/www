<?php
	namespace App\Controllers;
	
	use Framework\Controller;
	use Framework\FormBuilder;
	use App\Controllers\UserControllerHelper;
	
	class UserController extends Controller{

		public function register(){
			$form = new FormBuilder;
			$form->setId('Reg');
			$form->setMethod('POST');
			$form->setClass('form-control');
			
			$form->addField('text',['name'=>'name','class'=>'form-control','placeholder'=>'Ім\'я']);
			$form->addField('text',['name'=>'surname','class'=>'form-control','placeholder'=>'Фамілія']);
			$form->addField('email',['name'=>'email','class'=>'form-control','placeholder'=>'Email']);
			$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Login']);
			$form->addField('password',['maxlength'=>'25', 'name'=>'password','class'=>'form-control', 'placeholder'=>'Пароль']);
			$form->addField('submit',['value'=>'Відправити','class'=>'btn btn-primary btn-lg btn-block']);
			$data=$form->createForm();
			
			$this->render('app/views/ViewRegister.php',$data);
			$user=new UserControllerHelper($this->getRequest());
			$user->save();
		}

		public function confirm($login){
			$user=new UserControllerHelper($this->getRequest());
			return $user->confirmUser($login);
		}

		public function login(){
			$form = new FormBuilder;
			$form->setId('Login');
			$form->setMethod('POST');
			$form->setClass('form-control');
			
			$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Логін']);
			$form->addField('password',['maxlength'=>'25', 'name'=>'password', 'class'=>'form-control', 'placeholder'=>'Пароль']);
			$form->addField('submit',['value'=>'Відправити','class'=>'btn btn-primary btn-lg btn-block']);
			$data=$form->createForm();
			
			$this->render('app/views/ViewLogin.php',$data);
			$user=new UserControllerHelper($this->getRequest());
			$user->setSessionVar();
		}
		public function logout(){
			unset($_SESSION['login']);
		}
	}
?>