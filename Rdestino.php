<?php
require_once('modelo/general.php');
$id=$_GET['id'];
$id_ruta=$_GET['id_ruta'];
$id_usu=$_GET['id_usu'];
$id_carrito=$_GET['id_des'];
$id_compra=$_GET['id_compra'];
if(!$id==null){
    
    botonComprar($id, $id_usu, $id_ruta);
    $id=null;
    $id_usu=null;
    $id_ruta=null;
    header("location: destinos.php");
}

if(!$id_carrito==null){
    
    EliminarCarrito($id_carrito);
    $id=null;
    header("location: cart.php");
    
}
if(!$id_compra==null){
    
    EliminarCompra($id_compra);
    $id=null;
    $id_usu=null;
    header("location: travel_destination.php");
    
}

?>