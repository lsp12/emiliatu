<?php
require_once("../database/db.php");
$con = connectDatabase();
$id=$_GET['id'];
$fecha=$_GET['fecha'];
$hora=$_GET['hora'];
echo "<script>alert('$id y $fecha y $hora')</script>";
$query=$con->query("UPDATE destino SET $fecha = '0000-00-00', $hora = '0' WHERE `destino`.`id_destino` = $id");
header("location: admin-1.php");
?>