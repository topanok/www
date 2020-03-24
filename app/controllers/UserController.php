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
					echo 'Ви успішно зареєструвались!';
				}
				else{
					echo 'Вже існує юзер з таким логіном чи імейлом!';
				}
			}
			else{
				echo 'Заповніть всі поля!';
			} 
		}

		public function register(){
			$form = new FormBuilder;
			$form->setId('Reg');
			$form->setMethod('POST');
			$form->setClass('form-control');
			
			$form->addField('text',['name'=>'name','placeholder'=>'Ім\'я']);
			$form->addField('text',['name'=>'surname','placeholder'=>'Фамілія']);
			$form->addField('email',['name'=>'email','placeholder'=>'Email']);
			$form->addField('text',['name'=>'login','placeholder'=>'Login']);
			$form->addField('password',['maxlength'=>'25', 'name'=>'password', 'placeholder'=>'Пароль']);
			$form->addField('submit',['value'=>'Відправити']);
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
			
			$form->addField('text',['name'=>'login','placeholder'=>'Логін']);
			$form->addField('password',['maxlength'=>'25', 'name'=>'password', 'placeholder'=>'Пароль']);
			$form->addField('submit',['value'=>'Відправити']);
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
						echo 'Вітаємо '.$userIsset[0]['name'].' ! Ви увійшли як '.$data['login'].'.';
					}
					else{
						echo 'Невірний пароль!';
					}
				}
				else{
					echo 'Користувача з таким логіном не існує';
				}
			}
		}
	}
?>