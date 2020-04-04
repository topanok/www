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
			$data=$model->getData();
			If (array_key_exists('id',$data)){
				return $this->update($data);
			}
			else{
				$columns=array_keys($data);
				$columns=implode(',', $columns);
				$values=array_values($data);
				$stripValues=[];
				foreach($values as $elem){
					$stripValues[]=strip_tags($elem);
				}
				$str='';
				for($i=0;$i<count($stripValues);$i++){
					$str.='?,';
				}
				$str = substr($str, 0, -1);
				$stmt = $this->connect()->prepare("INSERT INTO $this->table ($columns) VALUES ($str)");
				$stmt->execute($stripValues);
			}
		}
		
		private function update(array $data){
			$id=(int) $data['id'];
			$dataDb=$this->getById($id);
			if(!empty($dataDb)){
				$columns=array_slice(array_keys($data), 1);
				$columns=implode('=?,',$columns);
				$columns .= '=?';
				$values=array_slice(array_values($data), 1);
				$values[]=$id;
				$sql="UPDATE $this->table SET $columns WHERE id=?";
				$stmt = $this->connect()->prepare($sql);
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