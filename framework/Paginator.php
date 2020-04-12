<?php
	namespace Framework;

	class Paginator{
		private $onPage;
		private $items;
		private $pages;
		private $pagin='';
		private $maxLi;

		public function setOnPage(int $num){
			$this->onPage = $num;
		}
		public function setItems(array $items){
			$this->items = $items;
		}
		public function setMaxLi(int $num){
			$this->maxLi = $num;
		}
		public function getPagination(){
			if($this->items && $this->onPage){
				$this->pages=ceil(count($this->items) / $this->onPage);
			}
			if($this->maxLi>=$this->pages){
				$this->maxLi = $this->pages;
			}
			$uri=trim($_SERVER['REQUEST_URI'],'/');
			$arrOfUri=explode('/',$uri);
			$page=$arrOfUri[count($arrOfUri) - 1];
			$leftAndRight=floor($this->maxLi/2);
			//$page=$numPage;
			$this->pagin='<nav><center><ul class="pagination">';
			if($page > 1){
				$previous=$page-1;
				$this->pagin.='<li><a href="http://localhost/users/page/'.$previous.'"><span aria-hidden="true"><<</span></a></li>';
			}
			else{
				$page=1;
				$this->pagin.='<li class="disabled"><a href=""><span aria-hidden="true"><<</span></a></li>';
			}
			if($page-$leftAndRight<1){
				$i=1;
				for($i;$i<=$this->maxLi;$i++){
					if ($page == $i){
						$this->pagin.='<li class="active"><a href="#">'.$i.'</a></li>';
					}
					else{
						$this->pagin.= '<li><a href="http://localhost/users/page/'.$i.'">'.$i.'</a></li>';
					}
				}
			}
			else{
				$i=$page-$leftAndRight;
				if($page+$leftAndRight>$this->pages){
					$i=$this->pages-$this->maxLi+1;
					for($i;$i<=$this->pages;$i++){
						if ($page == $i){
							$this->pagin.='<li class="active"><a href="#">'.$i.'</a></li>';
						}
						else{
							$this->pagin.= '<li><a href="http://localhost/users/page/'.$i.'">'.$i.'</a></li>';
						}
					}
				}
				else{
					for($i;$i<=$page+$leftAndRight;$i++){
						if ($page == $i){
							$this->pagin.='<li class="active"><a href="#">'.$i.'</a></li>';
						}
						else{
							$this->pagin.= '<li><a href="http://localhost/users/page/'.$i.'">'.$i.'</a></li>';
						}
					}
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