<?php
    function connectDatabase(){
        $host='sql10.freemysqlhosting.net';
        $user='sql10364992';
        $pass='GzwBid3zQI';
        $db='sql10364992';
        $mysqli = new mysqli($host,$user,$pass,$db);
        if($mysqli->connect_errno){
            $result = "Fallo al conectar a MySQL: " . $mysqli->connect_error;
        }
        return $mysqli;
    }
?>