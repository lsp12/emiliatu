<?php
require_once("../database/db.php");
$con = connectDatabase();
$id=$_GET['id'];
$id_acepta=$_GET['id_acepta'];
$id_rechaza=$_GET['id_rechaza'];
if(!$id==null){

$query=$con->query("DELETE FROM `rutas` WHERE `rutas`.`ID` = $id");
$id_acepta=null;
$id_rechaza=null;
}
if(!$id_acepta==null){
    $query=$con->query("UPDATE `compras` SET `Estado_pago` = 'Aprobado' WHERE `compras`.`id` = $id_acepta");
    
    $id_rechaza=null;
}
if(!$id_rechaza==null){
    $query=$con->query("UPDATE `compras` SET `Estado_pago` = 'Cancelado' WHERE `compras`.`id` = $id_rechaza");
}
$ma_activo=$_GET['ma_activo'];
$ma_inactivo=$_GET['ma_inactivo'];
if (!$ma_activo==null) {
    $query=$con->query("UPDATE `buses` SET `estado` = 'activo' WHERE `buses`.`matricula` = '$ma_activo'");
    
}
if (!$ma_inactivo==null) {
    $query=$con->query("UPDATE `buses` SET `estado` = 'inactivo' WHERE `buses`.`matricula` = '$ma_inactivo'");
}
$ced=$_GET['ced'];
if(!$ced==null){
    $query=$con->query("DELETE FROM `empleado` WHERE `empleado`.`cedula` = $ced");
}

header("location: admin-1.php");
?>