<?php
	namespace App\Controllers;
	use Framework\Controller;
	use Framework\Mailer;
	use Framework\FormBuilder;
	use Framework\Session;
	
	class UserController extends Controller{
		private $values=["name"=>"" ,"surname"=>"", "email"=> "" ,"login"=>"" ,"password"=> "" ];

		public function register(){
			$request=$this->getRequest();
			if(!empty($request->getParams() )){
				$this->values=$request->getParams();
			}
			$form = new FormBuilder;
			$form->setId('Reg');
			$form->setMethod('POST');
			$form->setClass('');
			
			$form->addField('text',['name'=>'name','class'=>'form-control','placeholder'=>'Ім\'я','value'=>$this->values['name']]);
			$form->addField('text',['name'=>'surname','class'=>'form-control','placeholder'=>'Фамілія','value'=>$this->values['surname']]);
			$form->addField('email',['name'=>'email','class'=>'form-control','placeholder'=>'Email', 'value'=>$this->values['email']]);
			$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Login', 'value'=>$this->values['login']]);
			$form->addField('password',['maxlength'=>'25', 'name'=>'password','class'=>'form-control', 'placeholder'=>'Пароль']);
			$form->addField('submit',['value'=>'Відправити','class'=>'btn btn-primary btn-lg btn-block']);
			$data=$form->createForm();
			
			$session=new Session;
			$data.=$session->save();
			if(isset($_SESSION['errors'])){
				$data.=implode($_SESSION['errors']);
			}
			$this->render('app/views/ViewRegister.php',$data);
		}

		public function login(){
			$request=$this->getRequest();
			if(!empty($request->getParams() )){
				$this->values=$request->getParams();
			}
			$form = new FormBuilder;
			$form->setId('Login');
			$form->setMethod('POST');
			$form->setClass('');
			
			$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Логін', 'value'=>$this->values['login']]);
			$form->addField('password',['maxlength'=>'25', 'name'=>'password', 'class'=>'form-control', 'placeholder'=>'Пароль']);
			$form->addField('submit',['value'=>'Увійти','class'=>'btn btn-primary btn-lg btn-block']);
			$data=$form->createForm();
			$session=new Session;
			$data.=$session->confirmLogin();
			if(isset($_SESSION['errors'])){
				$data.=implode($_SESSION['errors']);
			}
			$this->render('app/views/ViewLogin.php',$data);
		}

		public function confirmEmail($login){
			$session=new Session;
			$data=$session->confirmEmail($login);
			$this->render('app/views/ViewConfirmEmail.php',$data);
		}

		public function logout(){
			$session=new Session;
			$session->logout();
		}
	}
?>