<?php
	namespace Framework;
	use App\Config\SMTPConfig;
	
	class Mailer extends SMTPConfig{
		
		public function sendMail($to,$theme,$mesage){
			$mail=$this->getPHPMailerobj();
			$mail->addAddress($to);
			$mail->Subject = $theme;
			$mail->Body    = $mesage;
			if (!empty($_FILES['myfile']['name'][0])) {
				for ($ct = 0; $ct < count($_FILES['myfile']['tmp_name']); $ct++) {
					$uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['myfile']['name'][$ct]));
					$filename = $_FILES['myfile']['name'][$ct];
					if (move_uploaded_file($_FILES['myfile']['tmp_name'][$ct], $uploadfile)) {
						$mail->addAttachment($uploadfile, $filename);
					} else {
						$msg .= 'Неудалось прикрепить файл ' . $uploadfile;
					}
				}   
			}
			if ($mail->send()) {
				echo "Сообщение отправлено";
			} else {
				echo "Сообщение не было отправлено. Неверно указаны настройки вашей почты";
			}
		}
	}
?>