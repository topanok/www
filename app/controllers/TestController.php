<?php
	namespace App\Controllers;

	use PDO;
	use Framework\ConnectDB;
	use App\Models\WorkersModel;
	
	class TestController extends ConnectDB{

		private $table='workers';

		public function save($model){
			$array=array('name'=>'ivanko','age'=>23,'salary'=>1550);
			$obj=new WorkersModel;
			$obj->setData($array);
			//$class=explode('\\',get_class($obj));
			//$table= strtolower((str_replace('Model','',end($class))));
			$options=$obj->getData();
			$columns=implode(',', array_keys($options));
			$values=array_values($options);
			$str='';
			for($i=0;$i<count($values);$i++){
				$str.='?,';
			}
			$str = substr($str, 0, -1);
			$stmt = $this->connect()->prepare("INSERT INTO $this->table ($columns) VALUES ($str)");
			$stmt->execute($values);
		}
		
		public function getById(int $id):array{
			$stmt = $this->connect()->query(" SELECT * FROM $this->table WHERE id = $id ");
			return $results = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		
		public function delById(int $id) {
			$this->connect()->exec(" DELETE FROM $this->table WHERE id = $id ");
		}
		
		public function getByParam(string $column,$value){
			$stmt=$this->connect()->query(" SELECT * FROM $this->table WHERE $column = '$value' ");
			$results = $stmt->fetchall(PDO::FETCH_ASSOC);
		}
		
		public function delByParam(string $column,$value){
			$this->connect()->exec(" DELETE FROM $this->table WHERE $column = '$value' ");
		}
		
		public function insertByParam(string $column,$value){
			$this->connect()->exec("INSERT INTO $this->table ($column) VALUES ('$value')");
		}

		public function getList(){
			$stmt = $this->connect()->query(" SELECT * FROM $this->table ");
			$results = $stmt->fetchall(PDO::FETCH_ASSOC);
			var_dump($results);
		}
	}
?>