<?php
$php_mailer_added = 1;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once(dirname(__FILE__) . '/PHPMailer/src/Exception.php');
require_once(dirname(__FILE__) . '/PHPMailer/src/PHPMailer.php');
require_once(dirname(__FILE__) . '/PHPMailer/src/SMTP.php');
function mailSend($recepitientMail,$ccMail,$replyMail,$subject,$body){
		$mail = new PHPMailer(true);
			$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$mail->IsSMTP();
        $mail->SMTPDebug = 2; 
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->Username = 'care@switchmyloan.in';
			$mail->Password = 'SML2023@123';
		foreach($recepitientMail as $recptomail){
			$mail->AddAddress($recptomail);
		} 
		foreach($ccMail as $cctomail){
			$mail->AddCC($cctomail);
		}
		foreach($replyMail as $replytomail){
			$mail->AddReplyTO($replytomail);
		}
		$mail->SetFrom('care@switchmyloan.in', 'SwitchMyLoan');
        $mail->Subject =$subject;
        $mail->Body = $body;
        $mail->IsHTML(true);	
		if($mail->Send()){
			echo $message = "Message has been sent";
		}else{
			echo $message = "Not sent";
		}
		return $message;
}
?>
