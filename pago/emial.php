<?php

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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
function enviar_email(){
    
    
    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    //Enable SMTP debugging
    // SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;
    
    //Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'jonathankenny852@gmail.com';
    
    //Password to use for SMTP authentication
    $mail->Password = 'puchojenzo1';
    
    //Set who the message is to be sent from
    $mail->setFrom('jonathankenny852@gmail.com', 'Jonathan Vera');
    
    //Set an alternative reply-to address
    $mail->addReplyTo('jonathankenny852@gmail.com');
    
    //Set who the message is to be sent to
    $mail->addAddress('jonathankenny852@gmail.com');
    $mail->addAddress('tamaquiza.aldahir@gmail.com');
    
    //Set the subject line
    $mail->Subject = 'PHPMailer GMail SMTP test';
    
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    /* $mail->msgHTML(file_get_contents('contents.html'), __DIR__); */
    
    //Replace the plain text body with one created manually
    $mail->AltBody = '<b>hola!!!!!</b>';
    $mail->Body    = '<b>Primer correo de prueba</b>';
    //Attach an image file
    /* $mail->addAttachment('images/phpmailer_mini.png'); */
    
    //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }
        
}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
?>