<?php
	namespace App\Controllers;
	use Framework\Mailer;
	use Framework\Db;
	use App\Models\UsersModelRepository;

	class UserControllerHelper{
		private $objRequest;
		public function __construct(object $request){
			$this->objRequest=$request;
		}
		public function save(){	
			$data=$this->objRequest->getParams();
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			if(!empty($data['login']) && !empty($data['email']) && !empty($data['password'])){
				$userIsset=$db->getByParam('login',$data['login']);
				$emailIsset=$db->getByParam('email',$data['email']);
				if(empty($userIsset) && empty($emailIsset)){
					$data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
					$db->save($user->set($data));
					$mail=new Mailer;
					$mail->sendMail($data['email'], 'Завершення реєстрації', 'Для завершення реєстрації перейдіть по <a href="http://localhost/user/confirm/'.$data['login'].'">посиланню</a>');
					echo '<div><h3>Вітаємо! Щоб завершити реєстрацію-перейдіть по посиланню, яке відправлено Вам на email .</h3></div>';
				}
				else{
					echo '<div><h3>Вже існує юзер з таким логіном чи імейлом!</h3></div>';
				}
			}
			else{
				echo '<div><h3>Заповніть всі поля!</h3></div>';
			} 
		}

		public function confirmUser($login){
			$user=new UsersModelRepository;
			$db=new DB($user->getTable());
			$data=$db->getByParam('login',$login);
			if($data){
				$data[0]['confirm']=1;
				$db->save($user->set($data[0]));
				$_SESSION['login']=$login;
				echo 'Ура , ви завершили реєстрацію!<br>';
				echo '<a href="http://localhost/cabinet">Перейти</a> у кабінет<br>';
				echo '<a href="http://localhost/index.php">Перейти</a> на головну<br>';
				echo '<a href="http://localhost/user/logout">Вийти</a>';
			}
		}

		public function setSessionVar(){
			$data=$this->objRequest->getParams();
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
					echo '<div><h3>Користувача з таким логіном не існує!</h3></div>';
				}
			}
		}
	}
?>