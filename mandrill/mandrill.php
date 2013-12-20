<?php
	require("PHPMailer/class.phpmailer.php");
	
	define('MANDRIL_USERNAME', 'email@gmail.com');
	define('MANDRILL_API_KEY', 'CrazySequenceOfChars');
	
	function mail_mandrill($from_mail, $from_name, $to, $subject, $message) {
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->CharSet = 'iso-8859-1';

		$mail->Host       = "smtp.mandrillapp.com"; // SMTP server example
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
		$mail->Username   = MANDRIL_USERNAME; // SMTP account username example
		$mail->Password   = MANDRILL_API_KEY;        // SMTP account password example

		$mail->addAddress($to);

		$mail->From = $from_mail;
		$mail->FromName = utf8_decode($from_name);

		$mail->isHTML(true);
		$mail->Body = $message;
		$mail->Subject = $subject;

		if(!$mail->send()) {
			return false;
		}

		return true;
	}

	mail_mandrill("email@dominio-configurado-no-mandril.com", "Nome do remetente", "fulano-que-vai-receber@gmail.com", "Assunto do email", "Mensagem<br />Em<br/>HTML.");
?>