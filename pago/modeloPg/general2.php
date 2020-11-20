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
?>
