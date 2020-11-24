<?php
require_once('../database/db.php');
$con = connectDatabase();

/* $to = "tamaquiza.aldahir@gmail.com";
$subject = "Asunto del email";
$headers = "From: crisrpdev@gmail.com" . "\r\n";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$message = "Hola mundo!";
$correo=@mail($to, $subject, $message);
if($correo){
echo "enviado correctamente";
}else{
    echo "no se encontro el dominio";
} */




/* use EmailPHP\PHPMailer;
use EmailPHP\Exception; */
/* use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

 $mail = new PHPMailer(true);
 
try {
    //Server settings
    $mail->setLanguage('es', '/PHPMailer/language/phpmailer.lang-es');  
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'jonathankenny852@gmail.com';                     // SMTP username
    $mail->Password   = 'puchojenzo1';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom('jonathankenny852@gmail.com', 'Jonathan Vera');
    $mail->addAddress('jonathankenny852@gmail.com');            // Add a recipient
                 // Name is optional
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
$usuario="jonathan";
$destino="guallaquil";
$desino="el usuario: $usuario a comprado voletos para el destino: $destino";
    $query=$con->query("INSERT INTO `correos` (`id`, `asunto`, `descripcion`, `estado_vista`, `fecha`) VALUES (NULL, 'compra de voletos', $desino, 'no leido', '2020-11-03');");
?>