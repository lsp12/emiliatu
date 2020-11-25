<?php
require_once('../database/db.php');
$con = connectDatabase();
function recorrer($query){
    $rows = [];
    while($row = $query->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
function comprar($id_us,$id_des, $pasejeros, $cantidad){
    global $con;
    $a=1;
    while ($a <= $pasejeros) {
        $consulta=$con->query("INSERT INTO boleto (id_usuario, id_destino, precio, fecha_compra, num_boleto) 
    VALUES ($id_us, $id_des, $cantidad, NOW(), NULL)");
        $a++;
    }
    $consulta=$con->query("INSERT INTO boleto (id_usuario, id_destino, precio, pasajeros, fecha_compra, num_boleto) 
    VALUES ($id_us, $id_des, $cantidad, $pasejeros, NOW(), NULL)");
    header("location: ../index.php");
    
}

function Fechas($id_des){
    global $con;
    $query=$con->query("SELECT fecha, ID FROM `rutas` WHERE id_destino = $id_des");
    return recorrer($query);
}
function Compra($id_us,$id_des, $pasejeros, $cantidad, $id_ru){
    global $con;
    $query=$con->query("INSERT INTO `compras`(
        `id`,
        `id_usuario`,
        `id_destino`,
        `boletos`,
        `costo`,
        `ruta_id`,
        `Estado_pago`
    )
    VALUES(
        NULL,
        '$id_us',
        '$id_des',
        '$pasejeros',
        '$cantidad',
        '$id_ru',
        'pendiente'
    )");
}
function EliminarC($id_compra){
    global $con;
    $query=$con->query("DELETE FROM `carrito` WHERE `carrito`.`id_compra` = $id_compra");
}
function fecha($id_ruta){
    global $con;
    $query=$con->query("SELECT rutas.fecha, destino.nombre FROM rutas INNER JOIN destino ON destino.id_destino = rutas.id_destino WHERE rutas.ID = $id_ruta");
    return recorrer($query);
}

    function Dispon($id_ruta){
        global $con;
        $query=$con->query("SELECT compras.boletos FROM compras WHERE ruta_id = $id_ruta");
        return recorrer($query);

    }

    /* Enviar un Email Al comprar */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
function enviar_email($id_usu, $id_des, $pago, $pasajeros, $id_ruta){
    
    
    global $con;
    $query=$con->query("SELECT * FROM `usuario` WHERE `id_user` = $id_usu");
    $usuario = recorrer($query);
    $query=$con->query("SELECT
    rutas.id_buses,
    rutas.fecha,
    rutas.hora,
    destino.nombre,
    destino.descripcion,
    empleado.nombre_emp, empleado.apellido
FROM
    `rutas`
INNER JOIN destino ON destino.id_destino = rutas.id_destino
INNER JOIN empleado ON empleado.cedula = rutas.id_emple
WHERE
    rutas.ID = $id_ruta");
    $ruta = recorrer($query);
    enviarNo($usuario[0]['username'],$ruta[0]['nombre']);
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
    $mail->Username = 'emiliatur.sa@gmail.com';
    
    //Password to use for SMTP authentication
    $mail->Password = 'Emiliatur852';
    
    //Set who the message is to be sent from
    $mail->setFrom('emiliatur.sa@gmail.com', 'emiliatur sa');
    
    //Set an alternative reply-to address
    $mail->addReplyTo('emiliatur.sa@gmail.com');
    
    //Set who the message is to be sent to
    $mail->addAddress($usuario[0]['email']);
    /* $mail->addAddress('tamaquiza.aldahir@gmail.com'); */
    
    //Set the subject line
    $mail->Subject = 'Emiliatur-SA';
    
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    /* $mail->msgHTML(file_get_contents('contents.html'), __DIR__); */
    
    //Replace the plain text body with one created manually
    $mail->AltBody = '<b>Emiliatur-SA</b>';
    $mail->Body    = '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hola usuario '.$usuario[0]['username'].'</br>
    Usted a comprado '.$pago.' voletos,</br>
    Por un total de: '.$pasajeros.',  
    Destino: '.$ruta[0]['nombre'].'
    Fecha de salida '.$ruta[0]['fecha'].', hora de salida '.$ruta[0]['hora'].'
    Estado de verificacion de pago: <b>Pendiente</b>
    Su conductor es '.$ruta[0]['nombre_emp'].' '.$ruta[0]['apellido'].'
    <p>Descripcion :</p>
    <p>'.$ruta[0]['descripcion'].'</p>
    </body>
</html>
    '
    ;
    //Attach an image file
    /* $mail->addAttachment('images/phpmailer_mini.png'); */
    
    //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
       
    }
    
    enviar_a($usuario, $ruta);
}

function enviar_a($usuario, $ruta){
    
    
    
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
    $mail->Username = 'emiliatur.sa@gmail.com';
    
    //Password to use for SMTP authentication
    $mail->Password = 'Emiliatur852';
    
    //Set who the message is to be sent from
    $mail->setFrom('emiliatur.sa@gmail.com', 'emiliatur sa');
    
    //Set an alternative reply-to address
    $mail->addReplyTo('emiliatur.sa@gmail.com');
    
    //Set who the message is to be sent to
    $mail->addAddress('emiliatur.sa@gmail.com');
    /* $mail->addAddress('tamaquiza.aldahir@gmail.com'); */
    
    //Set the subject line
    $mail->Subject = 'Emiliatur-SA';
    
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    /* $mail->msgHTML(file_get_contents('contents.html'), __DIR__); */
    
    //Replace the plain text body with one created manually
    $mail->AltBody = '<b>Emiliatur-SA</b>';
    $mail->Body    = '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    El usuario '.$usuario[0]['username'].'</br>
    a comprado
    Destino: '.$ruta[0]['nombre'].'
    Fecha de salida '.$ruta[0]['fecha'].', hora de salida '.$ruta[0]['hora'].'
    Estado de verificacion de pago: <b>Pendiente</b> 
    Entre al administrador para validar o cancelar el pago
    Su conductor es '.$ruta[0]['nombre_emp'].' '.$ruta[0]['apellido'].'
    <p>Descripcion :</p>
    <p>'.$ruta[0]['descripcion'].'</p>
    </body>
</html>
    '
    ;
    //Attach an image file
    /* $mail->addAttachment('images/phpmailer_mini.png'); */
    
    //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
       
    }
    
        
}
function enviarNo($usuario,$destino){
    global $con;
    
    $desino="el usuario $usuario a comprado voletos para el destino: $destino";
    $query=$con->query("INSERT INTO `correos` (`id`, `asunto`, `descripcion`, `estado_vista`, `fecha`) VALUES (NULL, 'compra de voletos', '$desino', 'no leido', NOW());");
    
}
?>

    
</body>
</html>