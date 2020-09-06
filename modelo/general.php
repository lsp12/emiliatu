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

    function botonComprar($id_desti){
        global $con;
        $query=$con->query("INSERT INTO carrito (`id_compra`, `destino`) VALUES (NULL, '$id_desti')");
    }

?>