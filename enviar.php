<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Mailer/src/Exception.php';
require 'Mailer/src/PHPMailer.php';
require 'Mailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
//$mail = new PHPMailer(true);
$mail = new PHPMailer(true);

try {
	$mail->SMTPOptions = array(
		'ssl'=> array(
		'verify_peer'=> false,
		'verify_depth'=> false,
		'verify_peer_name'=> false,
		'allow_self_signed'=> true
		)
	);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //$mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jaapatech.2022@outlook.com';                     //SMTP username
    $mail->Password   = 'jaapasa1234';                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set

    //Recipients
    $mail->setFrom('jaapatech.2022@outlook.com', 'JAAPA');
    $mail->addAddress('jacqueline.charles.se@usb.edu.mx', 'Jackie');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Feliz cumpleaños!';
    $mail->Body    = 'JAAPA le desea un feliz cumpleaños!';
    $mail->AltBody = 'Gracias por utilizar nuestro sistema!';

    $mail->send();
    echo 'Mensaje enviado';

} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}