<?php
	namespace App\Config;
	
	abstract class SMTPConfig {
		private $config= [
			"smtp_username"=> "topanok2015@gmail.com",
			"smtp_password"=> "Y2FzZXkwODA0ODY=",       //encoded
			"smtp_from"=> "topanok2015@gmail.com",
			"smtp_host"=> "smtp.gmail.com",
			"smtp_port"=> "465",
			"smtp_debug"=> 'true',
			"smtp_charset"=> "UTF-8"
		];
		public function getConfig(){
			return $this->config;
		}
	}
?>