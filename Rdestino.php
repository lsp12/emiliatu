<?php
require_once('modelo/general.php');
$id=$_GET['id'];
botonComprar($id);
header("location: destinos.php");
?>