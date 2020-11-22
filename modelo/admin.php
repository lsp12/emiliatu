<?php
    require_once("../database/db.php");
    $con = connectDatabase();

    function recorrer($query){
        $rows = [];
        while($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    function consulta($tabla, $id){
        global $con;
        $query = $con->query("SELECT * FROM $tabla WHERE destino.id_destino=$id");
        return recorrer($query);
    }
    function buscarRutas($id_des,$ced,$fecha,$id_bus){
        /* echo "$id_des+$ced+$fecha+$id_bus"; */
        global $con;
        $query = $con->query("SELECT
        destino.nombre,
        empleado.nombre_emp,
        buses.matricula,
        rutas.id_emple,
        rutas.fecha
    FROM
        rutas
    INNER JOIN empleado ON empleado.cedula = rutas.id_emple
    INNER JOIN buses ON buses.matricula = rutas.id_buses
    INNER JOIN destino ON destino.id_destino = rutas.id_destino
    WHERE
        (
            (
                buses.matricula = '$id_bus' OR empleado.cedula = $ced
            ) AND destino.id_destino = $id_des
        ) AND(
            destino.fecha_1 = '$fecha' OR destino.fecha_2 = '$fecha' OR destino.fecha_3 = '$fecha'
        )");
        return recorrer($query);
    }
    function mostrarRutinas(){
        global $con;
        $query = $con->query("SELECT
        rutas.ID,
        destino.nombre,
        empleado.nombre_emp,
        
        buses.matricula,
        rutas.fecha
    FROM
        rutas
    INNER JOIN empleado ON empleado.cedula = rutas.id_emple
    INNER JOIN buses ON buses.matricula = rutas.id_buses
    INNER JOIN destino ON destino.id_destino = rutas.id_destino;");
        return recorrer($query);
    }
    function mostrarUsuario(){
        global $con;
        $query = $con->query("SELECT * FROM usuario");
        return recorrer($query);
    }
    
    function Buscar($email){
        global $con;
        $query=$con->query("SELECT * FROM usuario WHERE email='$email'");
        return recorrer($query);
    }
    function mostrarDestino(){
        global $con;
        $query=$con->query("SELECT * FROM destino");
        return recorrer($query);
    }
    function mostrarConductor(){
        global $con;
        $query=$con->query("SELECT * FROM empleado");
        return recorrer($query);
    }
    function mostrarBuses(){
        global $con;
        $query=$con->query("SELECT buses.matricula FROM buses");
        return recorrer($query);
    }
    function actualizarHorario($ced_emp, $id_des, $id_mat,$fecha){
        global $con;
        $query=$con->query("INSERT INTO rutas (id_emple, id_destino, id_buses, fecha) VALUES ('1207564565', '4', 'hps-453', '2020-09-17')");
    }
    
    
    function BusquedaFecha($fecha, $id_bus, $id_emplea){
        global $con;
        $aux=0;
        $url='admin-1.php';
            $query=$con->query("SELECT * FROM rutas WHERE rutas.id_emple = $id_emplea AND rutas.fecha ='$fecha'");
            $primero =recorrer($query);
            
            if($primero==null){
                $aux=1;
                $query=$con->query("SELECT * FROM rutas WHERE rutas.id_buses = '$id_bus' AND rutas.fecha ='$fecha'");
                $segundo=recorrer($query);
                if($segundo==null){
                    $aux=2;
                    return $aux;
                }else{
                    $aux=0;
                    echo '<script> alert ("ya estan ocupado el bus elimine para reemplazar")</script>';
                    return $aux;
                    echo '<meta http-equiv=refresh content="1; '.$url.'">';
                }
            }else{
                $aux=0;
                echo '<script> alert ("ya estan ocupadas la elimine la  conductor para reemplazar")</script>';
                return $aux;
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
            }
        
        

        /* return recorrer($query); */
    }

    function agregarfecha($id_emplea,$id_destino, $id_bus, $fecha, $hora){
        global $con;
        $url='admin-1.php';
        $busqueda=BusquedaFecha($fecha, $id_bus, $id_emplea);
        var_dump($busqueda);
        echo $busqueda==null;
        if($busqueda==2){

            $query=$con->query("INSERT INTO `rutas`(
                `ID`,
                `id_emple`,
                `id_destino`,
                `id_buses`,
                `fecha`,
                `hora`
            )
            VALUES(
                NULL,
                '$id_emplea',
                '$id_destino',
                '$id_bus',
                '$fecha',
                '$hora'
            )");
            echo '<script> alert ("Ingresado correctamente")</script>';
            
            echo '<meta http-equiv=refresh content="1; '.$url.'">';
            die;
        }else{
            echo '<script> alert ("ya estan ocupadas la elimine la  conductor para reemplazar")</script>';
            
            echo '<meta http-equiv=refresh content="1; '.$url.'">';
            die;
        }
    }
    function Horarios(){
        global $con;
        $query=$con->query("SELECT
		rutas.ID,
        destino.nombre,
        rutas.fecha,
        rutas.hora
    FROM
        `rutas`
    INNER JOIN destino ON destino.id_destino = rutas.id_destino	 ORDER BY rutas.id_destino ASC");

        return recorrer($query);
    }
    function BoletosCom(){
        global $con;
        $query=$con->query("SELECT
        boleto.num_boleto,
        boleto.numero_pasj,
        boleto.id_usuario,
        usuario.username,
        boleto.fecha_compra,
        destino.nombre
    FROM
        boleto
    INNER JOIN usuario ON usuario.id_user = boleto.id_usuario
    INNER JOIN destino ON destino.id_destino = boleto.id_destino");

    return recorrer($query);
    }
    function EstadoPg(){
        global $con;
        $query = $con->query("SELECT usuario.id_user, usuario.username, usuario.email, compras.id, destino.nombre, compras.id_destino, compras.boletos, compras.costo FROM compras 
        INNER JOIN usuario ON usuario.id_user=compras.id_usuario INNER JOIN destino ON destino.id_destino = compras.id_destino WHERE compras.Estado_pago='pendiente';");
        return recorrer($query);
        }
    function Destinodoc($id_des){
        global $con;
        $query=$con->query("");
        /* return recorrer($query); */
    }

    function EstadoBs(){
        global $con;
        $query=$con->query("SELECT `numeroVehiculo`, `estado`, `matricula` FROM `buses` ORDER BY `buses`.`numeroVehiculo` ASC");
        return recorrer($query);
    }

    function InsertarBus($matricula,$peso,$Altura,$capacidad,$estado){
        global $con;
        $query=$con->query("INSERT INTO `buses`(
            `matricula`,
            `peso`,
            `altura`,
            `capacidad`,
            `estado`,
            `numeroVehiculo`
        )
        VALUES(
            '$matricula',
            '$peso',
            '$Altura',
            '$capacidad',
            '$estado',
            NULL
        )");
    }

    function InsertaEmp($cedula,$nombre_emp,$apellido,$edad,$sexo,$celular){
        global $con;
        $query=$con->query("INSERT INTO `empleado`(
            `cedula`,
            `nombre_emp`,
            `apellido`,
            `edad`,
            `sexo`,
            `telefono`
        )
        VALUES(
            '$cedula',
            '$nombre_emp',
            '$apellido',
            '$edad',
            '$sexo',
            '$celular'
        )");
    }
    function ActEmple(){
        global $con;
        $query=$con->query("SELECT * FROM `empleado` ORDER BY `empleado`.`cedula` ASC");
        return recorrer($query);
    }   

    function comprar($id_us,$id_des, $pasejeros, $cantidad){
        global $con;
        $a=1;
        while ($a <= $pasejeros) {
            $consulta=$con->query("INSERT INTO boleto (id_usuario, id_destino, precio, fecha_compra, numero_pasj, num_boleto) 
        VALUES ($id_us, $id_des, $cantidad, NOW(), '$a', NULL)");
            
        }
        $consulta=$con->query("INSERT INTO boleto (id_usuario, id_destino, precio, pasajeros, fecha_compra, numero_pasj, num_boleto) 
        VALUES ($id_us, $id_des, $cantidad, $pasejeros, NOW(),'$a', NULL)");
        
        
    }
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
function enviar_email($id_ruta){
    
    
    global $con;
    $query=$con->query("SELECT
    rutas.id_buses,
    rutas.fecha,
    rutas.hora,
    destino.nombre,
    destino.descripcion,
    usuario.username, usuario.email, compras.boletos, compras.costo, compras.Estado_pago
FROM
    `compras`
INNER JOIN rutas ON rutas.ID = compras.ruta_id
INNER JOIN destino ON destino.id_destino = compras.id_destino
INNER JOIN usuario ON usuario.id_user = compras.id_usuario
WHERE
    compras.id = $id_ruta");
    $ruta = recorrer($query);
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
    $mail->addAddress($ruta[0]['email']);
    /* $mail->addAddress('tamaquiza.aldahir@gmail.com'); */
    
    //Set the subject line
    $mail->Subject = 'PHPMailer GMail SMTP test';
    
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
    Hola usuario '.$ruta[0]['username'].' Su pago a sido aprobado</br>
    Usted a comprado '.$ruta[0]['boletos'].' voletos</br>
    Por un total de: '.$ruta[0]['costo'].'
    Destino: '.$ruta[0]['nombre'].'
    Fecha de salida '.$ruta[0]['fecha'].', hora de salida '.$ruta[0]['hora'].'
    Estado de verificacion de pago: <b>Aprobado</b>
    
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
    enviar_a($ruta);
}





function enviar_recha($id_ruta){
    
    
    global $con;
    
    $query=$con->query("SELECT
    rutas.id_buses,
    rutas.fecha,
    rutas.hora,
    destino.nombre,
    destino.descripcion,
    usuario.username, usuario.email, compras.boletos, compras.costo,compras.Estado_pago
FROM
    `compras`
INNER JOIN rutas ON rutas.ID = compras.ruta_id
INNER JOIN destino ON destino.id_destino = compras.id_destino
INNER JOIN usuario ON usuario.id_user = compras.id_usuario
WHERE
    compras.id = $id_ruta");
    $ruta = recorrer($query);
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
    $mail->addAddress($ruta[0]['email']);
    /* $mail->addAddress('tamaquiza.aldahir@gmail.com'); */
    
    //Set the subject line
    $mail->Subject = 'PHPMailer GMail SMTP test';
    
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
    Hola usuario '.$ruta[0]['username'].' Su pago a sido aprobado</br>
    Usted a comprado '.$ruta[0]['boletos'].' voletos</br>
    Por un total de: '.$ruta[0]['costo'].'
    Destino: '.$ruta[0]['nombre'].'
    Fecha de salida '.$ruta[0]['fecha'].', hora de salida '.$ruta[0]['hora'].'
    Estado de verificacion de pago: <b>Rechazado</b>
    
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
    enviar_a($ruta);
}

function enviar_a($ruta){
    
    
    
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
    $mail->Subject = 'PHPMailer GMail SMTP test';
    
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
    El usuario '.$ruta[0]['username'].'</br>
    a comprado
    Destino: '.$ruta[0]['nombre'].'
    Fecha de salida '.$ruta[0]['fecha'].', hora de salida '.$ruta[0]['hora'].'
    Estado de verificacion de pago: <b>Pendiente</b> 
    se a cambiado el estado a: '.$ruta[0]['Estado_pago'].'
    
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

?>