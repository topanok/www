<?php
	namespace App\Config;
	use Librarys\PHPMailer\PHPMailer;
	
	abstract class SMTPConfig {
		public function getPHPMailerobj(){
			$mail=new PHPMailer();
			$mail->isSMTP();   
			$mail->CharSet = "UTF-8";                                          
			$mail->SMTPAuth   = true;
			$mail->isHTML(true);

			// Настройки SMTP
			$mail->Host       = 'smtp.gmail.com';        		// SMTP сервер
			$mail->Username   = 'topanok2015@gmail.com'; 		// Логин на почте
			$mail->Password   = 'casey080486';           		// Пароль на почте
			$mail->SMTPSecure = 'ssl';
			$mail->Port       = 465;
			$mail->setFrom('topanok2015@gmail.com', 'Bogdan'); 	// Адрес самой почты и имя отправителя
			return $mail;
		}
	}
?>