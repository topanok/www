<?php
	namespace Framework;
	
	class FormBuilder{
		private $form;
		private $input='';
		private $class;
		private $method;
		private $id;
		
		public function setId($id){
			$this->id = $id;
		}
		public function setMethod($method){
			$this->method=$method;
		}
		public function setClass($class){
			$this->class=$class;
		}
		public function addField(string $type, array $options){  // $options= ['name'=>'name','placeholder'=>'name'......]
			if($type == 'textarea'){
				$this->input.='<p><textarea';
				foreach ($options as $key=>$value){
					$this->input.=' '.$key.'='.$value;
				}
				$this->input.='></textarea></p>';
			}
			elseif($type == 'radio' || $type == 'checkbox'){
				$this->input.='<p><input type='.$type;
				foreach ($options as $key=>$value){
					$this->input.=' '.$key.'='.$value;
				}
				if (array_key_exists('nameToSee',$options) && !empty($options['nameToSee'])){
					$this->input.='>'.$options['nameToSee'].'</p>';
				}
				else{
					$this->input.='></p>';
				}
			}
			else{
				$this->input.='<p><input type='.$type;
				foreach ($options as $key=>$value){
					$this->input.=' '.$key.'='.$value;
				}
				$this->input.='></p>';
			}
		}			
		public function createForm(){
			$this->form='<form id='.$this->id.' class='.$this->class.' method='.$this->method.'>';
			$this->form.=$this->input.'</form>';
			echo $this->form;
		}
	}
?>