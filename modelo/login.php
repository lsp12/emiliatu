<?php
ob_start();
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
        $clave=password_hash($datos_registro[2], PASSWORD_DEFAULT);
        $con->query("INSERT INTO usuario (username, email, clave) VALUES ('$datos_registro[0]', '$datos_registro[1]', '$clave')");
        header("location: index.php");
    }
    function confirmar($correo){	
        global $con;
        //password_verify($pasword);
        $consulta = $con->query("SELECT * FROM usuario where email='$correo'");
        return recorrer($consulta);
    } 

    function norepet($correo){
        global $con;
        $consol=$con->query("SELECT email FROM usuario WHERE email='$correo'");
        $array=recorrer($consol);
        return $array;
    }

    ob_end_flush();?>