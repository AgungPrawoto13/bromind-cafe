<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer{

	protected $_ci;
	protected $email_pengirim = '';
	protected $nama_pengirim = 'Bromind Cafe';
	protected $password = '';

	public function __construct()
	{
		//set variabel _ci dengan fungsi2 dari codeigniter
		$this->_ci =&get_instance();

		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
		require_once(APPPATH.'third_party/phpmailer/class.phpmailer.php');
		require_once(APPPATH.'third_party/phpmailer/class.smtp.php');
		require_once(APPPATH.'third_party/phpmailer/Exception.php');
		require_once(APPPATH.'third_party/phpmailer/PHPMailer.php');
		require_once(APPPATH.'third_party/phpmailer/SMTP.php');
	}

	// public function send($data)
	// {
		
	// 	$mail = new PHPMailer;
	// 	$mail->isSMTP();

	// 	$mail->Host = 'smtp.gmail.com';
	// 	$mail->SMTPAuth = true;
	// 	//$mail->SMTPAutoTLS = false;
	// 	$mail->Username = $this->email_pengirim;
	// 	$mail->Password = $this->password;
	// 	$mail->SMTPSecure = 'tls';
	// 	$mail->Port = 587;
	// 	$mail->SMTPDebug = 0;

	// 	$mail->SMTPOptions = array(
	// 		'ssl' => array(
	// 			'verify_peer' => false,
	// 			'verify_peer_name' => false,
	// 			'allow_self_signed' => true
	// 		)
	// 	);

	// 	$mail->setFrom($this->email_pengirim, $this->nama_pengirim);
	// 	$mail->addAddress($data['email_penerima']);
	// 	$mail->isHTML(true);

	// 	$mail->Subject = $data['subject'];
	// 	$mail->Body = $data['content'];
	// 	$mail->AddEmbeddedImage('assets/img/logo_BM.png','logo_bromind','logo_BM.png');

	// 	$send = $mail->send();

	// 	if($send){
	// 		$response = array(
	// 			'status' => 'Sukses',
	// 			'message' => 'Email berhasil dikirim'
	// 		);
	// 	} else {
	// 		$response = array(
	// 			'status' => 'gagal',
	// 			'message' => 'email gagal dikirim'
	// 		);
	// 	}
		
	// 	return $response;
	// }

	// public function send_with_attachment($data)
	// {
	// 	$mail = new PHPmailer;
	// 	$mail->isSMTP();

	// 	$mail->Host = 'smtp.gmail.com';
	// 	$mail->Username = $this->email_pengirim;
	// 	$mail->Password = $this->password;

	// 	$mail->Port = 465;
	// 	$mail->SMTPAuth = true;
	// 	$mail->SMTPSecure = 'ssl';
	// 	$mail->SMTPDebug = 2;

	// 	$mail->setFrom($this->email_pengirim, $this->nama_pengirim);
	// 	$mail->addAddress($data['email_penerima'], '');
	// 	$mail->isHTML(true);

	// 	$mail->Subject = $data['subject'];
	// 	$mail->Body = $data['content'];
	// 	$mail->AddEmbeddedImage('assets/img/logo_BM.png');

	// 	if($data['attachment']['size'] <= 25000000){
	// 		$mail->addAttachment($data['attachment']['tmp_name'], $data['attachment']['name']);

	// 		$send = $mail->send();

	// 		if($send){
	// 			$response = array(
	// 				'status' => 'Sukses',
	// 				'message' => 'Email berhasil dikirim'
	// 			);
	// 		} else {
	// 			$response = array(
	// 				'status' => 'gagal',
	// 				'message' => 'email gagal dikirim'
	// 			);
	// 		}
	// 	}else{
	// 		$response = array(
	// 			'status' => 'gagal',
	// 			'message' => 'ukuran file attachment maksimal 25mb'
	// 		);
	// 	}

	// 	return $response;
	// }
}