<?php

require_once('database/db.php');

$con = connectDatabase();

    function recorrer($query){
        $rows = [];
        while($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    function consulta($tabla, $name_id_tabla){
        global $con;
        $query = $con->query("SELECT * FROM $tabla ORDER BY $name_id_tabla DESC");
        return recorrer($query);
    }
    function mostrarDestino(){
        global $con;
        $qery=$con->query("SELECT * FROM destino ORDER BY RAND() ");
        return recorrer($qery);
    }

    function botonComprar($id_desti,$id_usu,$id_ruta){
        global $con;
        $query=$con->query("INSERT INTO `carrito` (`id_compra`, `destino`, `id_usuario`, `id_ruta`) VALUES (NULL, $id_desti, $id_usu , $id_ruta);");
    }
    function buscarDestino($id){
        global $con;
        $query=$con->query("SELECT
        destino.nombre,
        destino.descripcion,
        fecha,
        rutas.ID,
        destino.imagen
    FROM
        `rutas`
    INNER JOIN destino ON destino.id_destino = rutas.id_destino
    WHERE
        rutas.id_destino = $id");
        return recorrer($query);
    }
    function Descripcion($id){
        global $con;
        $query=$con->query("SELECT * FROM `destino` WHERE id_destino = $id");
        
        return recorrer($query);
    }
    function Disponivilidad($id_des,$id_usu){
        global $con;
        $query=$con->query("SELECT * FROM `compras` WHERE id_destino = $id_des");   
        return recorrer($query);
    }
    function CarritoEle($id_usu){
        global $con;
        $query=$con->query("SELECT
        destino.imagen, destino.nombre, rutas.fecha, carrito.id_compra, carrito.id_ruta, carrito.destino
    FROM
        `carrito`
    INNER JOIN destino ON carrito.destino = destino.id_destino
    INNER JOIN rutas ON carrito.id_ruta = rutas.ID
    WHERE
        carrito.id_usuario = $id_usu");
        return recorrer($query);
    }
    
    function EliminarCarrito($id){
        global $con;
        $query=$con->query("DELETE FROM carrito WHERE carrito.destino = $id");
    }

    function BusquedaD($busq,$fecha1){
        global $con;
        /* $query=null; */
        $newDate = date("yy-m-d", strtotime($fecha1));
        
        if($newDate=="7070-01-01"){
            
            $query=$con->query("SELECT * FROM `destino` WHERE destino.nombre LIKE '%$busq%'");
        }elseif($busq==null){
            $query=$con->query("SELECT 
            destino.id_destino,
            destino.nombre,
            destino.imagen,
            rutas.fecha FROM `rutas` INNER JOIN destino ON destino.id_destino = rutas.id_destino WHERE rutas.fecha LIKE '%$newDate%'");
            
        }elseif($newDate==null && $busq==null){
            echo "Ingrese algun parametro";
            
        }else{
            $query=$con->query("SELECT
            destino.id_destino,
            destino.nombre,
            destino.imagen,
            rutas.fecha
        FROM
            `rutas`
        INNER JOIN destino ON destino.id_destino = rutas.id_destino
        WHERE
            fecha LIKE '%$newDate%' AND destino.nombre LIKE '%$busq%'");
        }
        return recorrer($query);
    }

    function CarritoEl($id_usu){
        global $con;
        $query=$con->query("SELECT
        destino.nombre,
        destino.imagen,
        destino.id_destino,
        boleto.precio,
        boleto.id_usuario,
        boleto.Estado_pago
    FROM
        `boleto`
    INNER JOIN destino ON destino.id_destino = boleto.id_destino
    WHERE
        id_usuario = $id_usu");
        return recorrer($query);
    }
    function Compras($id_usu){
    global $con;
    $query = $con->query("SELECT
    id,
    destino.nombre,
    destino.imagen,
    destino.id_destino,
    id_usuario,
    costo,
    Estado_pago,
    boletos
FROM
    `compras`
INNER JOIN destino ON destino.id_destino = compras.id_destino
WHERE
    compras.id_usuario = $id_usu");
    return recorrer($query);
    }
    function EliminarCompra($id_compra){
        global $con;
        $query=$con->query("DELETE FROM `compras` WHERE `compras`.`id` = $id_compra");
    }
    function Dispon($id_ruta){
        global $con;
        $query=$con->query("SELECT compras.boletos FROM compras WHERE ruta_id = $id_ruta");
        return recorrer($query);

    }


    
?>