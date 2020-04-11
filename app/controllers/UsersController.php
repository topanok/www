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
					$data.= 'Імя - '.$arr[$num-1][$i]->getName().' Фамілія - '.$arr[$num-1][$i]->getSurname().' Логін - '.$arr[$num-1][$i]->getLogin().'<br>';
				}
			}
			$pagin=new Paginator;
			$pagin->setOnPage($this->onPage);
			$pagin->setItems($objItems);
			$data.=$pagin->getPagination();
			$this->render('app/views/ViewUsers.php',$data);
		}
	}
?>