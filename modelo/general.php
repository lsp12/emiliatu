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

    function botonComprar($id_desti,$id_usu){
        global $con;
        $query=$con->query("INSERT INTO `carrito` (`id_compra`, `destino`, `id_usuario`) VALUES (NULL, $id_desti, $id_usu);");
    }
    function buscarDestino($id){
        global $con;
        $query=$con->query("SELECT
        destino.nombre,
        destino.descripcion,
        fecha,
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
    function CarritoEle($id_usu){
        global $con;
        $query=$con->query("SELECT
        nombre,
        descripcion,
        destino.imagen,
        id_destino, 
        usuario.username
    FROM
        destino
    INNER JOIN carrito ON carrito.destino = destino.id_destino
    INNER JOIN usuario ON carrito.id_usuario = usuario.id_user
    WHERE
        usuario.id_user = $id_usu");
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
        boleto.id_usuario
    FROM
        `boleto`
    INNER JOIN destino ON destino.id_destino = boleto.id_destino
    WHERE
        id_usuario = $id_usu");
        return recorrer($query);
    }
    
?>