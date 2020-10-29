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
header("location: admin-1.php");
?>