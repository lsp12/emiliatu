<?php
ob_start();
require_once("../database/db.php");
require_once("../modelo/admin.php");
$con = connectDatabase();


$id_acepta=$_GET['id_acepta'];


if(!$id_acepta==null){
    $query=$con->query("UPDATE `compras` SET `Estado_pago` = 'Aprobado' WHERE `compras`.`id` = $id_acepta");
    $id_us=$_GET['id_usuario'];
    $id_des=$_GET['id_destino'];
    $pasejeros=$_GET['boletos'];
    $cantidad=$_GET['costo'];
    enviar_email($id_acepta);

    for ($i=0; $i < $pasejeros; $i++) { 
        $consulta=$con->query("INSERT INTO boleto (id_usuario, id_destino, precio, fecha_compra, numero_pasj, num_boleto) 
        VALUES ($id_us, $id_des, $cantidad, NOW(), '$i', NULL)");        
        }
        header("location: admin-1.php");
        /* $consulta=$con->query("INSERT INTO boleto (id_usuario, id_destino, precio, pasajeros, fecha_compra, numero_pasj, num_boleto) 
        VALUES ($id_us, $id_des, $cantidad, $pasejeros, NOW(),'$a', NULL)"); */
    /* comprar($id_us,$id_es,$pasejeros,$cantidad); */
    
    

}
$id_rechaza=$_GET['id_rechaza'];
if(!$id_rechaza==null){
    $query=$con->query("UPDATE `compras` SET `Estado_pago` = 'Cancelado' WHERE `compras`.`id` = $id_rechaza");
    enviar_recha($id_rechaza);
    header("location: admin-1.php");
}
$ma_activo=$_GET['ma_activo'];
$ma_inactivo=$_GET['ma_inactivo'];
if (!$ma_activo==null) {
    $query=$con->query("UPDATE `buses` SET `estado` = 'activo' WHERE `buses`.`matricula` = '$ma_activo'");
    header("location: admin-1.php");
}
$id=$_GET['id'];

if(!$id==null){

$query=$con->query("DELETE FROM `rutas` WHERE `rutas`.`ID` = $id");
header("location: admin-1.php");
}
if (!$ma_inactivo==null) {
    $query=$con->query("UPDATE `buses` SET `estado` = 'inactivo' WHERE `buses`.`matricula` = '$ma_inactivo'");
    header("location: admin-1.php");
}
$ced=$_GET['ced'];
if(!$ced==null){
    $query=$con->query("DELETE FROM `empleado` WHERE `empleado`.`cedula` = $ced");
    header("location: admin-1.php");
}
$nom_bol=$_GET['num_boleto'];
if(!$nom_bol==null){
    $sql =$con->query( "DELETE FROM `boleto` WHERE `boleto`.`num_boleto` = $nom_bol");
    header("location: admin-1.php");
}

header("location: admin-1.php");
ob_end_flush();
?>