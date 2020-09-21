<?php
    function connectDatabase(){
        /* $host='sql10.freemysqlhosting.net';
        $user='sql10365856';
        $pass='29UlP2tmKT';
        $db='sql10365856'; */ 
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