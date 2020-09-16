<?php
    function connectDatabase(){
        $host='sql10.freemysqlhosting.net';
        /* $host='localhost'; */
        $user='sql10365856';
        /* $user='root'; */
        $pass='29UlP2tmKT';
        /* $pass=''; */
        $db='sql10365856';
        /* $db='emiliatur-sa'; */
        $mysqli = new mysqli($host,$user,$pass,$db);
        if($mysqli->connect_errno){
            $result = "Fallo al conectar a MySQL: " . $mysqli->connect_error;
        }
        return $mysqli;
    }
?>