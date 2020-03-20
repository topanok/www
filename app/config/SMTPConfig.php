<?php
	namespace App\Config;
	
	abstract class SMTPConfig {
		public $charSet 	= "UTF-8";             
		public $SMTPAuth   	= true;
		public $isHtml		= true;
		public $host      	= 'smtp.ukr.net';
		public $userName    = 'topanok2015@ukr.net';
		public $password    = 'sEw0l4cgNlNLAw0I';
		public $SMTPSecure  = 'ssl';
		public $port        = 465;
		public $fromMail	='topanok2015@ukr.net';
		public $fromName	='Bogdan';
		public $sendCopy	=true;
		public $sendCopyMail='topanok2015@ukr.net';
		public $sendCopyName='Bogdan';
	}
?>