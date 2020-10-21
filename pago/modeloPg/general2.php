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
    $query=$con->query("SELECT fecha FROM `rutas` WHERE id_destino = $id_des");
    return recorrer($query);
}
?>