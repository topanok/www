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
			if (array_key_exists('id',$data)){
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
				$stripValues=[];
				foreach($values as $elem){
					$stripValues[]=strip_tags($elem);
				}
				$sql="UPDATE $this->table SET $columns WHERE id=?";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute($stripValues);
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

		public function getByParams(array $columns, array $values){
			if(count($columns) == count($values)){
				$where='';
				for($i=0; $i<count($columns); $i++){
					$where.=$columns[$i].' = "'.$values[$i].'" AND ';
				}
				$where=substr($where,0,-5);
				$sql=' SELECT * FROM '.$this->table.' WHERE '.$where;
				$this->connect()->exec($sql);
			}
		}

		public function delByParams(array $columns, array $values){
			if(count($columns) == count($values)){
				$where='';
				for($i=0; $i<count($columns); $i++){
					$where.=$columns[$i].' = "'.$values[$i].'" AND ';
				}
				$where=substr($where,0,-5);
				$sql=' DELETE FROM '.$this->table.' WHERE '.$where;
				$this->connect()->exec($sql);
			}
		}
		
		public function insertByParam(string $column,$value){
			$this->connect()->exec("INSERT INTO $this->table ($column) VALUES ('$value')");
		}
		
		public function getList(){
			$stmt=$this->connect()->query(" SELECT * FROM $this->table ");
			return $results = $stmt->fetchall(PDO::FETCH_ASSOC);
		}

		public function getLimitList($from, $many){
			$stmt=$this->connect()->query(" SELECT * FROM $this->table LIMIT $from, $many");
			return $results = $stmt->fetchall(PDO::FETCH_ASSOC);
		}

		public function getCount(){
			$stmt=$this->connect()->query(" SELECT COUNT(*) as count FROM $this->table ");
			return $results = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		public function getSumByParams(string $column, string $groupBy){
			$stmt=$this->connect()->query(" SELECT $groupBy, sum($column) FROM $this->table GROUP BY $groupBy ");
			return $results = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		public function getByIn(string $column, string $in){
			$stmt=$this->connect()->query(" SELECT * FROM $this->table WHERE $column IN( $in ) ");
			return $results = $stmt->fetchall(PDO::FETCH_ASSOC);
		}

		public function getColumns(){
			$stmt=$this->connect()->query(" DESCRIBE $this->table ");
			return $results = $stmt->fetchall(PDO::FETCH_ASSOC);
		}
	}