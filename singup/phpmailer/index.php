<?php
include("class.phpmailer.php");
include("class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->Port = 587;
$mail->Username = "odnam93@gmail.com";
$mail->Password = "valarmorghulis3ds*";

$mail->From = "odnam93@gmail.com";
$mail->FromName = "Armando";
$mail->Subject = "Subject del Email";
$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";
$mail->MsgHTML("Hola, te doy mi nuevo numero<br><b>xxxx</b>.");
$mail->AddAttachment("files/files.zip");
$mail->AddAttachment("files/img03.jpg");
$mail->AddAddress("armando@wearetrafika.com", "Destinatario");
$mail->IsHTML(true);

if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Mensaje enviado correctamente";
}
?>
