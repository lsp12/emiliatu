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

    function consulta($tabla, $name_id_tabla){
        global $con;
        $query = $con->query("SELECT * FROM $tabla ORDER BY $name_id_tabla DESC");
        return recorrer($query);
    }

    function añadirUsuario($datos_registro){
        global $con;
        $con->query("INSERT INTO usuario (nombre, email, clave) VALUES ('$datos_registro[0]', '$datos_registro[1]', '$datos_registro[2]')");
    }

    function confirmar($correo, $pasword){	
        global $con;
        $consulta = $con->query("SELECT email, clave FROM usuario where email='$correo' and clave='$pasword'");
        return recorrer($consulta);
    } 
