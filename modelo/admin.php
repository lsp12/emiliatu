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
    function consulta($tabla, $id){
        global $con;
        $query = $con->query("SELECT * FROM $tabla WHERE destino.id_destino=$id");
        return recorrer($query);
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
        $query=$con->query("SELECT * FROM destino");
        return recorrer($query);
    }
    function mostrarConductor(){
        global $con;
        $query=$con->query("SELECT empleado.nombre FROM empleado");
        return recorrer($query);
    }
    function mostrarBuses(){
        global $con;
        $query=$con->query("SELECT buses.matricula FROM buses");
        return recorrer($query);
    }
    
    function actualizarDestino($id_des,$fecha,$hora){
        global $con;
        $fecha1=consulta("destino",$id_des);
        
        if($fecha1[0]['fecha_1']=="0000-00-00"){
            $query=$con->query("UPDATE destino SET fecha_1 = '$fecha', hora_1 = '$hora' WHERE destino.id_destino = $id_des");
            
        }elseif ($fecha1[0]['fecha_2']=="0000-00-00") {
            if($fecha==$fecha1[0]['fecha_1']){
                echo '<script> alert ("ya estan ocupadas las tres fechas si quiere insertar una nueva elimine la fecha que reemplazara ")</script>';
                
            }else{
                $query=$con->query("UPDATE destino SET fecha_2 = '$fecha', hora_2 = '$hora' WHERE destino.id_destino = $id_des");
            }
            
            
        }elseif ($fecha1[0]['fecha_3']=="0000-00-00") {
            if($fecha==$fecha1[0]['fecha_2']){
                echo '<script> alert ("ya estan ocupadas las tres fechas si quiere insertar una nueva elimine la fecha que reemplazara ")</script>';
                
            }else{
                $query=$con->query("UPDATE destino SET fecha_3 = '$fecha', hora_3 = '$hora' WHERE destino.id_destino = $id_des");
            }
            
            
        }else{
            echo '<script> alert ("ya estan ocupadas las tres fechas si quiere insertar una nueva elimine la fecha que reemplazara ")</script>';
        }
        $fecha=null;
        
        /* $aux=false;
        for ($i=1; $i <3 ; $i++) { 
            if($fecha==$fecha1["fecha_$i"]){
                $query=$con->query("UPDATE destino SET fecha_$i = '$fecha', hora_$i = '$hora' WHERE destino.id_destino = $id_des");
                $aux=true;
            return recorrer($query);
            }   
        }
        if($aux){
            echo '<script> alert "ya estan ocupadas las tres fechas si quiere insertar una nueva elimine la fecha que reemplazara "</script>';
        } */
    }
?>