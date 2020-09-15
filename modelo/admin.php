<?php
    require_once("../database/db.php");
    $con = connectDatabase();

    function recorrer($query){
        $rows = [];
        while($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    function mostrarUsuario(){
        global $con;
        $query = $con->query("SELECT * FROM usuario");
        return recorrer($query);
    }
    
    function Buscar($email){
        global $con;
        $query=$con->query("SELECT * FROM usuario WHERE email='$email'");
        return recorrer($query);
    }
    function mostrarDestino(){
        global $con;
        $query=$con->query("");
        return recorrer($query);
    }
?>