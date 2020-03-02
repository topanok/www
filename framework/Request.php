<?php
	namespace Framework;
	
	use IRequest;
	
	class Request implements IRequest{
		public function getParams(): array{
			return $_POST;
		}
		public function getQueryParams(): array {
			return $_GET;
		}
		public function getParam(string $param): string {
			return $_POST[$param];
		}
		public function getQueryParam(string $query): string {
			return $_GET[$query];
		}
		public function isPost():bool{
			if($_SERVER['REQUEST_METHOD']=='POST'){
			return true;
			}
			else{
				return false;
			}
		}
	}
?>