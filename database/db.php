<?php
    function connectDatabase(){
        $host='sql10.freemysqlhosting.net';
        $user='sql10365265';
        $pass='EnmXtq9e5b';
        $db='sql10365265';
        $mysqli = new mysqli($host,$user,$pass,$db);
        if($mysqli->connect_errno){
            $result = "Fallo al conectar a MySQL: " . $mysqli->connect_error;
        }
        return $mysqli;
    }
?>