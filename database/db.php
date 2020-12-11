<?php
    function connectDatabase(){
        /* $host='sql10.freemysqlhosting.net';
        $user='sql10365856';
        $pass='29UlP2tmKT';
        $db='sql10365856';  */

        $host='localhost';
        $user='root';
        $pass='';
        $db='emiliatur-sa';
        $puerto=null;

        /* $host='mysql-11088-0.cloudclusters.net';
        $user='vera';
        $pass='1207345768';
        $db='turismo_vera';
        $puerto=11136; */
        $mysqli = new mysqli($host,$user,$pass,$db,$puerto);
        if($mysqli->connect_errno){
            $result = "Fallo al conectar a MySQL: " . $mysqli->connect_error;
        }
        return $mysqli;
    }
?>