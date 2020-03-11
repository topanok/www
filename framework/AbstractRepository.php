<?php
	namespace Framework;
	
	use PDO;
	use Framework\ConnectDB;
	
	class AbstractRepository extends ConnectDB{

		private $table='answers';
		
		public function save(object $model){
			$options=array_slice($model->getData(),1);
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