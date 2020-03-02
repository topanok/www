<?php
	namespace Framework;
	
	interface IRequest {
		public function getParams(): array;
		public function getQueryParams(): array ;
		public function getParam(string $param): string ;
		public function getQueryParam(string $query): string ;
		public function isPost():bool ;
	}
?>