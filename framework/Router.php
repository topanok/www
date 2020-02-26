<?php
	class Router{
		private $first='controller_';
		private $end='.php';
		public function getUri(){
			return trim($_SERVER['REQUEST_URI'],'/');
		}
		public function go(){
			$uri=$this->getUri();
			$arrOfUri=explode('/',$uri);
			$correctUri=false;
			$controller=$this->first.$arrOfUri[0].$this->end;
			if (file_exists('clases/controllers/'.$controller) && count($arrOfUri)>=2) {
				$class=ucfirst($arrOfUri[0]);
				$method=$arrOfUri[1];
				spl_autoload_register(function ($class) {
					include 'controllers/controller_'.$class . '.php';
				});
				$obj=new $class;
				if(method_exists($class,$method)){
					$func_reflection = new ReflectionMethod($class,$method);
					$num_of_params = $func_reflection->getNumberOfParameters();
					if(count($arrOfUri)-2==$num_of_params){
						$correctUri=true;
						$params=[];
						for($i=0;$i<$num_of_params;$i++){
							$params[]=$arrOfUri[$i+2];
						}
						$reflectionMethod = new ReflectionMethod($class, $method );
						$reflectionMethod->invokeArgs(new $class(), $params);
					}
				}	
			} 
			if($correctUri);
			else {
				include '404.php';
			}
		}
	}
?>