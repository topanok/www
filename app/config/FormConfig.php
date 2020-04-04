<?php
	namespace App\Config;
	
	abstract class FormConfig{
		private $text=['name'=>'name','placeholder'=>'Ім\'я'];
		private $email=['name'=>'email','placeholder'=>'Email'];
		private $password=['maxlength'=>'25', 'name'=>'password', 'placeholder'=>'Пароль'];
		private $textarea=['name'=>'text','placeholder'=>'Текст'];
		private $select=['name'=>'select', 'size'=>'3', 'option_values'=>['Чебурашка','Крокодил','Бегемот']];
		private $radio=['name'=>'radio','value'=>'Yes','valueToSee'=>'Radio','Checked'=>''];
		private $checkbox=['name'=>'checkbox','value'=>'Yes','valueToSee'=>'Checkbox','Checked'=>''];
		private $file=['name'=>'file'];
		private $submit=['value'=>'Відправити'];
		
		public function getOptions($type){
			$options=get_object_vars($this);
			foreach ($options as $key=>$value){
				If ($key==$type){
					return $options[$key];
				}
			}
		}
	}
?>