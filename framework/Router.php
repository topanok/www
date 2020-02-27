<?php
	namespace Framework;

	use ReflectionMethod;
	
	class Router{
		private $prefix='Controller';
		private $endOfFile='Controller.php';
		public function getUri(){
			return trim($_SERVER['REQUEST_URI'],'/');
		}
		public function go(){
			$uri=$this->getUri();
			$arrOfUri=explode('/',$uri);
			$correctUri=false;
			$controller=$arrOfUri[0].$this->endOfFile;
			if (file_exists('app/controllers/'.$controller) && count($arrOfUri)>=2) {
				$class=ucfirst($arrOfUri[0]).$this->prefix;
				$method=$arrOfUri[1];
				$class = "App\Controllers\\{$class}";
				$obj= new $class;
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