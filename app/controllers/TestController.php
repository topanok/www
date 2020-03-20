<?php
	namespace App\Controllers;
	use Framework\Mailer;
	
	class TestController{
		public function mail($theme,$mesage){
			$to='topanok2015@gmail.com';
			$mail=new Mailer;
			return $mail->sendMail($to,$theme,$mesage);
		}
	}
?>