<?php
	namespace App\Controllers;
	
	use Framework\Controller;
	use Framework\FormBuilder;
	use App\Models\UsersModelRepository;
	use Framework\Db;
	
	class UserController extends Controller{

		private function save(){	
			$request=$this->getRequest();
			$data=$request->getParams();
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			if(!empty($data['login']) && !empty($data['email']) && !empty($data['password'])){
				$userIsset=$db->getByParam('login',$data['login']);
				$emailIsset=$db->getByParam('email',$data['email']);
				if(empty($userIsset) && empty($emailIsset)){
					$data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
					$db->save($user->set($data));
					echo '<div><h3>Ви успішно зареєструвались!</h3></div>';
				}
				else{
					echo '<div><h3>Вже існує юзер з таким логіном чи імейлом!</h3></div>';
				}
			}
			else{
				echo '<div><h3>Заповніть всі поля!</h3></div>';
			} 
		}

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
			$this->save();
		}

		public function login(){
			session_start();
			$form = new FormBuilder;
			$form->setId('Reg');
			$form->setMethod('POST');
			$form->setClass('form-control');
			
			$form->addField('text',['name'=>'login','class'=>'form-control','placeholder'=>'Логін']);
			$form->addField('password',['maxlength'=>'25', 'name'=>'password', 'class'=>'form-control', 'placeholder'=>'Пароль']);
			$form->addField('submit',['value'=>'Відправити','class'=>'btn btn-primary btn-lg btn-block']);
			$data=$form->createForm();
			
			$this->render('app/views/ViewLogin.php',$data);

			$request=$this->getRequest();
			$data=$request->getParams();
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			if(isset($data['login']) && isset($data['password'])){
				$userIsset=$db->getByParam('login',$data['login']);
				if(!empty($userIsset)){
					if(password_verify ( $data['password'] , $userIsset[0]['password'] ) ) {
						$_SESSION['login']=$data['login'];
						echo '<div><h3>Вітаємо '.$userIsset[0]['name'].' ! Ви увійшли як '.$data['login'].'.</h3></div>';
					}
					else{
						echo '<div><h3>Невірний пароль!</h3></div>';
					}
				}
				else{
					echo '<div><h3>Користувача з таким логіном не існує</h3></div>';
				}
			}
		}
	}
?>