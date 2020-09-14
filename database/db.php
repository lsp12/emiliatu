<?php
    function connectDatabase(){
        /* $host='sql10.freemysqlhosting.net'; */
        $host='localhost';
        /* $user='sql10365265'; */
        $user='root';
        /* $pass='EnmXtq9e5b'; */
        $pass='';
        /* $db='sql10365265'; */
        $db='emiliatur-sa';
        $mysqli = new mysqli($host,$user,$pass,$db);
        if($mysqli->connect_errno){
            $result = "Fallo al conectar a MySQL: " . $mysqli->connect_error;
        }
        return $mysqli;
    }
?>