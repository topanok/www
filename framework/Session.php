<?php
	namespace Framework;
	use Framework\Controller;
	use Framework\Db;
	use App\Models\UsersModelRepository;

	class Session extends Controller{
		private $errors=[];

		public function save(){
			$request=$this->getRequest();
			$data=$request->getParams();
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			if(!empty($data['login']) && !empty($data['email']) && !empty($data['password'])){
				$userIsset=$db->getByParam('login',$data['login']);
				$emailIsset=$db->getByParam('email',$data['email']);
				if(empty($userIsset)){
					if(empty($emailIsset)){
						unset($_SESSION['errors']);
						$data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
						$db->save($user->set($data));
						$mail=new Mailer;
						$mail->sendMail($data['email'], 'Завершення реєстрації', 'Для завершення реєстрації перейдіть по <a href="http://localhost/user/confirmemail/'.$data['login'].'">посиланню</a>');
						return '<h3>Вітаємо! Щоб завершити реєстрацію-перейдіть по посиланню, яке відправлено Вам на email .</h3>';
					}
					else{
						$this->errors['email']='<pre style="background-color: #F6CEEC"><h4>Вже існує юзер з таким імейлом!</h4></pre>';
					}
				}
				else{
					$this->errors['login']='<pre style="background-color: #F6CEEC"><h4>Вже існує юзер з таким логіном!</h4></pre>';
				}
			}
			else{
				$this->errors['empty_fields']='<h3>Заповніть всі поля!</h3>';
			}
			$_SESSION['errors']=$this->errors;
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
				return $data;
			}
		}

		public function confirmLogin(){
			$request=$this->getRequest();
			$data=$request->getParams();
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			if(isset($data['login']) && isset($data['password'])){
				$userIsset=$db->getByParam('login',$data['login']);
				if(!empty($userIsset)){
					if(password_verify ( $data['password'] , $userIsset[0]['password'] ) ) {
						$_SESSION['login']=$data['login'];
						unset($_SESSION['errors']);
						return '<h3>Вітаємо '.$userIsset[0]['name'].' ! Ви увійшли як '.$data['login'].'.</h3>';
					}
					else{
						$this->errors['password']='<pre style="background-color: #F6CEEC"><h4>Невірний пароль!</h4></pre>';
					}
				}
				else{
					$this->errors['login']='<pre style="background-color: #F6CEEC"><h4>Користувача з таким логіном не існує!</h4></pre>';
				}
			}
			else{
				$this->errors['empty_fields']='<h3>Заповніть всі поля!</h3>';
			}
			$_SESSION['errors']=$this->errors;
		}


		public function logout(){
			unset($_SESSION['login']);
			unset($_SESSION['errors']);
			header('Location: http://localhost/index.php');
		}
	}
?>