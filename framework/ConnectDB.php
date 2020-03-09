<?php
	namespace Framework;
	
	use App\Config\Config;
	use PDO;
	
	class ConnectDB extends Config{
		private $dsn = "mysql:host=localhost;dbname=test;charset=utf8";
		private $options = [
			  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			];
		public function connect():object {
			return new PDO($this->dsn, $this->userName, $this->pass, $this->options);
		}
	}
?>