<?php
	namespace App\Controllers;
	use App\Models\UsersModelRepository;
	use Framework\Paginator;
	use Framework\Controller;
	
	class UsersController extends Controller{
		private $onPage=3;
		public function page(int $num){
			$user=new UsersModelRepository;
			$objItems=$user->getItems();
			$arr=array_chunk($objItems, $this->onPage);
			$data='';
			for($i=0; $i<$this->onPage; $i++) {
				if(isset($arr[$num-1][$i])){
					$data.= 'Імя - <b>'.$arr[$num-1][$i]->getName().'</b> Фамілія - <b>'.$arr[$num-1][$i]->getSurname().'</b> Логін - <b>'.$arr[$num-1][$i]->getLogin().'</b> Email - <b>'.$arr[$num-1][$i]->getEmail().'</b><br><br>';
				}
			}
			$pagin=new Paginator;
			$pagin->setOnPage($this->onPage);
			$pagin->setItems($objItems);
			$pagin->setMaxLi(3);
			$data.=$pagin->getPagination();
			$this->render('app/views/ViewUsers.php',$data);
		}
	}
?>