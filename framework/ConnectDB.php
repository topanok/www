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
		
		private $table='workers';
		
		public function save(object $model){
			$options=$model->getData();
			$columns=implode(',', array_keys($options));
			$values=array_values($options);
			for($i=0;$i<count($values);$i++){
				$str.='?,';
			}
			$str = substr($str, 0, -1);
			If (array_key_exists('id',$options)){
				int $id=$options['id'];
				$data=$this->getById($id);
				if(!empty($data)){
					$stmt = $this->connect()->prepare("UPDATE $this->table ($columns) VALUES ($str) WHERE id='$id'");
					$stmt->execute($values);
				}
			}
			else{
				$stmt = $this->connect()->prepare("INSERT INTO $this->table ($columns) VALUES ($str)");
				$stmt->execute($values);
			}
		}
		
		public function getById(int $id):array{
			$stmt = $this->connect()->query(" SELECT * FROM $this->table WHERE id = $id ");
			return $results = $stmt->fetchall(PDO::FETCH_ASSOC);
		}
		
		public function delById(int $id) {
			$this->connect()->exec(" DELETE FROM $this->table WHERE id = $id ");
		}
		
		public function getByParam(string $column,$value){
			$stmt=$this->connect()->query(" SELECT * FROM $this->table WHERE $column = '$value' ");
			return $results = $stmt->fetchall(PDO::FETCH_ASSOC);
		}
		
		public function delByParam(string $column,$value){
			$this->connect()->exec(" DELETE FROM $this->table WHERE $column = '$value' ");
		}
		
		public function insertByParam(string $column,$value){
			$this->connect()->exec("INSERT INTO $this->table ($column) VALUES ('$value')");
		}
	}
?>