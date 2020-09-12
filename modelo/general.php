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

    function BusquedaD($busq){
        global $con;
        $query=$con->query("SELECT * FROM destino WHERE destino.nombre = '$busq'");
        return recorrer($query);
    }

?>