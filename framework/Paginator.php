<?php
	namespace Framework;

	class Paginator{
		private $onPage;
		private $items;
		private $pages;
		private $pagin='';

		public function setOnPage(int $num){
			$this->onPage = $num;
		}
		public function setItems(array $items){
			$this->items = $items;
		}
		public function getPagination(){
			if($this->items && $this->onPage){
				$this->pages=ceil(count($this->items) / $this->onPage);
			}
			$uri=trim($_SERVER['REQUEST_URI'],'/');
			$arrOfUri=explode('/',$uri);
			$page=$arrOfUri[count($arrOfUri) - 1];
			//$page=$numPage;
			$this->pagin='<nav><center><ul class="pagination">';
			if($page > 1){
				$previous=$page-1;
				$this->pagin.='<li><a href="http://localhost/users/page/'.$previous.'"><span aria-hidden="true"><<</span></a></li>';
			}
			else{
				$this->pagin.='<li class="disabled"><a href=""><span aria-hidden="true"><<</span></a></li>';
			}
			for($i=1; $i<=$this->pages; $i++){
				if ($page == $i){
					$this->pagin.='<li class="active"><a href="#">'.$i.'</a></li>';
				}
				else{
					$this->pagin.= '<li><a href="http://localhost/users/page/'.$i.'">'.$i.'</a></li>';
				}
			}
			if($page < $this->pages){
				$next=$page+1;
				$this->pagin.='<li><a href="http://localhost/users/page/'.$next.'"><span aria-hidden="true">>></span></a></li>';
			}
			else{
				$this->pagin.='<li class="disabled"><a href=""><span aria-hidden="true">>></span></a></li>';
			}
			$this->pagin.='</ul></center></nav>';
			return $this->pagin; 
		}

	}
?>