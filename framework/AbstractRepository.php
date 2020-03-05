<?php
	namespace Framework;
	
	use PDO;
	
	class AbstractRepository{
		private $dsn = "mysql:host=localhost;dbname=test;charset=utf8";
		private $options = [
			  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			];	
		private $pdo;
			
		public function connect($user,$pass):object {
			$this->pdo = new PDO($this->dsn, $user, $pass, $this->options);
		}
		
		public function getOneById(int $id, string $table):string {
			$stmt = $this->pdo->query(" SELECT * FROM '$table' WHERE id = '$id' ");
			return $results = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		
		public function delOneById(int $id, string $table):string {
			$pdo->query(" DELETE FROM '$table' WHERE id = '$id' ");
		}
		
		public function getAllUsers(string $table):string {
			$stmt = $this->pdo->query(" SELECT * FROM '$table' ");
			return $results = $stmt->fetchall(PDO::FETCH_ASSOC);
		}
	}
?>