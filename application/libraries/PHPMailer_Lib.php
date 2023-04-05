<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class PHPMailer_Lib
{
	public function loadMail(){
		
		log_message('Debug','PHPMailer class is loaded.');

		//include phpmailer library file
		require_once APPPATH.'third_party/PHPMailer/src/Exception.php';
		require_once APPPATH.'third_party/PHPMailer/src/PHPMailer.php';
		require_once APPPATH.'third_party/PHPMailer/src/SMTP.php';

		$mail = new PHPMailer;
		return $mail;
	}

	public function sendEmail($data){
		//PHPMailer object
		$mail = $this->loadMail();

		//SMTP configuration
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'cafe.bromind123@gmail.com';
		$mail->Password = 'Cafebromind123';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;

		$mail->setFrom('cafe.bromind123@gmail.com', 'Here your password');

		//Add a recipient
		$mail->addAddress($data['email_penerima']);

		//Set email format to HTML
		$mail->isHTML(true);

		//Email subject
		$mail->Subject = $data['subject'];
		$mail->Body = $data['content'];
		$mail->AddEmbeddedImage('assets/img/logo_BM.png','logo_bromind','logo_BM.png');

        //Send email
		$send = $mail->send();

		if($send){
			$response = [
				'status' => 'Sukses',
				'message' => 'Email has send'
			];
		} else {
			$response = [
				'status' => 'Failed',
				'message' => 'Email failed send',
				'info' => print($mail->ErrorInfo)
			];
		}

		return $response;

        // if(!$mail->send()){
        // 	echo "Message could not be send.";
        // 	echo "Mailer Error: ". $mail->ErrorInfo;
        // }else{
        // 	echo "Message has been sent";
        // }
	}
}