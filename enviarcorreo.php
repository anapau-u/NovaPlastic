<!DOCTYPE html>
<html lang="en">
<head>
  <title>Correo enviado</title>
  <!--     Fonts and icons     -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/casa.png"/>
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--     CSS Files     -->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> 
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-color: #e9fff9;">
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" action="menu-cap.php" method="post">
          <input type="hidden" name="nick" value="<?php echo $usuario; ?>">
          <input type="hidden" name="pass" value="<?php echo $contra; ?>">
          <span class="login100-form-title p-b-43">
            Correo enviado!
          </span>
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
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //$mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'novaplastic2022@outlook.com';                     //SMTP username
    $mail->Password   = 'novaplastic3002';                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set

    //Recipients
    $mail->setFrom('novaplastic2022@outlook.com', 'NovaPlastic');
    $mail->addAddress($_POST['correo'], $_POST['nombre']);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Felicidades!!!!';
    $mail->Body    = 'NovaPlastic le desea lo mejor en su dia especial!!';

    $mail->send();
    echo 'Mensaje enviado';

} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
?>
    <br>
    <div class="container-login100-form-btn">
        <input class="login100-form-btn" type="submit" value="Menú principal">
    </div>
</form>

<div class="login100-more" style="background-image: url('https://images.unsplash.com/photo-1603539279542-e7cf76a92801?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80');">
</div>
    </div>
        </div>
            </div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>