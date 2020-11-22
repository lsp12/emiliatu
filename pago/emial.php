<?php

$to = "tamaquiza.aldahir@gmail.com";
$subject = "Asunto del email";
/* $headers = "From: crisrpdev@gmail.com" . "\r\n"; */
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$message = "Hola mundo!";
$correo=@mail($to, $subject, $message);
if($correo){
echo "enviado correctamente";
}else{
    echo "no se encontro el dominio";
}



/* 
 require 'email/Exception.php';
 require 'email/PHPMailer.php';
 require 'email/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 $mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'jonathankenny852@gmail.com';                     // SMTP username
    $mail->Password   = 'puchojenzo1';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom('jonathankenny852@gmail.com', 'Jonathan Vera');
    $mail->addAddress('jonathankenny852@gmail.com', 'yo');     // Add a recipient
    $mail->addAddress('tamaquiza.aldahir@gmail.com', 'pucho');               // Name is optional
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Prueba de corre desde mi localhost';
    $mail->Body    = 'Primer correo de prueba</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'mensaje enviado correctamente';
} catch (Exception $e) {
    echo "Error al: {$mail->ErrorInfo}";
} */
?>