<?php
	namespace Framework;
	use PDO;
	use Framework\ConnectDB;
	
	class Db extends ConnectDB{
		private $table;
		
		public function __construct($table){
			$this->table=$table;
		}
		
		public function save(object $model){
			$options=$model->getData();
			$columns=array_keys($options);
			$values=array_values($options);
			$str='';
			for($i=0;$i<count($values);$i++){
				$str.='?,';
			}
			$str = substr($str, 0, -1);
			If (array_key_exists('id',$options)){
				$id=(int) $options['id'];
				$data=$this->getById($id);
				if(!empty($data)){
					$columns=array_slice(array_keys($options), 1);
					$columns=implode(',',$columns);
					$values=array_slice(array_values($options), 1);
					$str='';
					for($i=0;$i<count($values);$i++){
						$str.='?,';
					}
					$stmt = $this->connect()->prepare("UPDATE $this->table ($columns) VALUES ($str) WHERE id='$id'");
					$stmt->execute($values);
				}
			}
			else{
				$columns=implode(',', $columns);
				$stmt = $this->connect()->prepare("INSERT INTO $this->table ($columns) VALUES ($str)");
				$stmt->execute($values);
			}
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
			return $results = $stmt->fetchall(PDO::FETCH_ASSOC);
		}
		
		public function delByParam(string $column,$value){
			$this->connect()->exec(" DELETE FROM $this->table WHERE $column = '$value' ");
		}
		
		public function insertByParam(string $column,$value){
			$this->connect()->exec("INSERT INTO $this->table ($column) VALUES ('$value')");
		}
		
		public function getList(){
			$stmt=$this->connect()->query(" SELECT * FROM $this->table ");
			return $results = $stmt->fetchall(PDO::FETCH_ASSOC);
		}
	}