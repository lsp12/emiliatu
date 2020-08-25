<?php
    function connectDatabase(){
        $host='localhost';
        $user='root';
        $pass='';
        $db='emiliatur-sa';
        $mysqli = new mysqli($host,$user,$pass,$db);
        if($mysqli->connect_errno){
            $result = "Fallo al conectar a MySQL: " . $mysqli->connect_error;
        }
        return $mysqli;
    }
?>