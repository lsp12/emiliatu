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
    function Emiall(){
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
}
        
    }
?>
