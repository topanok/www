<?php
	namespace Framework;
	use App\Config\FormConfig;
	
	class FormBuilder extends FormConfig{
		private $form;
		private $input='';
		private $class;
		private $method;
		private $id;
		private $type;
		private $options;
		
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
		}
		private function addSelect(){
			$option='';
			$this->input.='<p><select';
			foreach ($this->options as $key=>$value){
				if(is_string($value)){
				$this->input.=' '.$key.'="'.$value.'"';
				}
			}
			$this->input.='>';
			$this->input.='<option disabled>Виберіть</option>';
			if(isset($this->options['option_values'])){
				foreach ($this->options['option_values'] as $value){
					$this->input.='<option value="'.$value.'">'.$value.'</option>';
				}
			}
			$this->input.='</select></p>';
		}
		private function addTextarea(){
			$this->input.='<p><textarea';
			foreach ($this->options as $key=>$value){
				$this->input.=' '.$key.'="'.$value.'"';
			}
			$this->input.='></textarea></p>';
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
		}
		public function addField(string $type){
			$this->type=$type;
			$this->options=$this->getOptions($type);
			switch ($type) {
				case 'textarea':
					$this->addTextarea();
					break;
				case 'select':
					$this->addSelect();
					break;
				case 'radio':
					$this->addRadioOrCheck();
					break;
				case 'checkbox':
					$this->addRadioOrCheck();
					break;
				default:
					$this->addInput();
			}
		}			
		public function createForm(){
			$this->form='<form id="'.$this->id.'" class="'.$this->class.'" method="'.$this->method.'">';
			$this->form.=$this->input.'</form>';
			echo $this->form;
			file_put_contents('Test.txt',$this->form);
		}
	}
?>