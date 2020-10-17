<?php
require_once("../database/db.php");
$con = connectDatabase();
$id=$_GET['id'];
$fecha=$_GET['fecha'];
$hora=$_GET['hora'];

$query=$con->query("DELETE FROM `rutas` WHERE `rutas`.`ID` = $id");


header("location: admin-1.php");
?>