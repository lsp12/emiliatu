<?php
require_once('modelo/general.php');
$id=$_GET['id'];
$id_carrito=$_GET['id_des'];
if(!$id==null){
    
    botonComprar($id);
    $id=null;
    header("location: destinos.php");
}

if(!$id_carrito==null){
    
    EliminarCarrito($id_carrito);
    $id=null;
    header("location: cart.php");
    
}

?>