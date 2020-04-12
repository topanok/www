<?php
	namespace Framework;
	
	class FormBuilder{
		private $action;
		private $form;
		private $input='';
		private $class='';
		private $method;
		private $encode='';
		private $id='';
		private $type;
		private $options;

		public function setEncode($encode){
			$this->encode=$encode;
		}
		public function setAction($action){
			$this->action = $action;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function setMethod($method){
			$this->method=$method;
		}
		public function setClass($class){
			$this->class=$class;
		}
		private function addInput(){
			$this->input.='<p><input type="'.$this->type.'"';
			foreach ($this->options as $key=>$value){
				$this->input.=' '.$key.'="'.$value.'"';
			}
			$this->input.='></p>';
			return $this->input;
		}
		private function addSelect(){
			if(isset($this->options['option_values'])){
				$this->input.='<p><select';
				foreach ($this->options as $key=>$value){
					if(is_string($value)){
					$this->input.=' '.$key.'="'.$value.'"';
					}
				}
				$this->input.='>';
				$this->input.='<option disabled>Виберіть</option>';
				foreach ($this->options['option_values'] as $value){
					$this->input.='<option value="'.$value.'">'.$value.'</option>';
				}
				$this->input.='</select></p>';
				return $this->input;
			}
			else {
				echo 'Error! Array not have option_values.';
			}
		}
		private function addTextarea(){
			$this->input.='<p><textarea';
			foreach ($this->options as $key=>$value){
				$this->input.=' '.$key.'="'.$value.'"';
			}
			$this->input.='></textarea></p>';
			return $this->input;
		}
		private function addRadioOrCheck(){
			$this->input.='<p><input type="'.$this->type.'"';
			foreach ($this->options as $key=>$value){
				$this->input.=' '.$key.'="'.$value.'"';
			}
			if (array_key_exists('valueToSee',$this->options) && !empty($this->options['valueToSee'])){
				$this->input.='>'.$this->options['valueToSee'].'</p>';
			}
			else{
				$this->input.='></p>';
			}
			return $this->input;
		}
		private function addButton(){
			$this->input.='<p><button';
			foreach ($this->options as $key=>$value){
				$this->input.=' '.$key.'="'.$value.'"';
			}
			$this->input.='>Відправити</button></p>';
			return $this->input;
		}
		public function addField(string $type, array $options){
			$this->type=$type;
			$this->options=$options;
			if ($type!='submit' && $type!='button' && $type!='file'){
				if(!empty($_SESSION['values']['form'][$this->id])){
					$this->options['value']=$_SESSION['values']['form'][$this->id][$options['name']];
				}
			}
			switch ($type) {
				case 'textarea':
					$this->input = $this->addTextarea($options);
					break;
				case 'select':
					$this->input = $this->addSelect($options);
					break;
				case 'radio':
					$this->input = $this->addRadioOrCheck($options);
					break;
				case 'checkbox':
					$this->input = $this->addRadioOrCheck($options);
					break;
				case 'button':
					$this->input = $this->addButton();
					break;
				default:
					$this->input = $this->addInput();
			}
			if (isset($_SESSION['errors']['form'][$this->id][$options['name']]['empty_fields'])){
				$this->input.=$_SESSION['errors']['form'][$this->id][$options['name']]['empty_fields'];
			}
			else{
				if (isset($_SESSION['errors']['form'][$this->id][$options['name']])){
					$this->input.=$_SESSION['errors']['form'][$this->id][$options['name']];
				}
			}
			return $this->input;
		}			
		public function createForm(){
			$this->form='<form enctype="'.$this->encode.'" action="'.$this->action.'" id="'.$this->id.'" class="'.$this->class.'" method="'.$this->method.'">';
			$this->form.=$this->input.'</form>';
			return $this->form;
		}
	}
?>