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
    function buscarRutas($id_des,$ced,$fecha,$id_bus){
        global $con;
        $query = $con->query("SELECT
        destino.nombre,
        empleado.nombre_emp,
        buses.matricula,
        rutas.fecha
    FROM
        rutas
    INNER JOIN empleado ON empleado.cedula = rutas.id_emple
    INNER JOIN buses ON buses.matricula = rutas.id_buses
    INNER JOIN destino ON destino.id_destino = rutas.id_destino
    WHERE
        buses.matricula = '$id_bus' AND destino.id_destino = $id_des AND empleado.cedula = $ced AND(
            destino.fecha_1 = '$fecha' OR destino.fecha_2 = '$fecha' OR destino.fecha_3 = '$fecha'
        )");
        return recorrer($query);
    }
    function mostrarRutinas(){
        global $con;
        $query = $con->query("SELECT
        rutas.ID,
        destino.nombre,
        empleado.nombre_emp,
        buses.matricula,
        rutas.fecha
    FROM
        rutas
    INNER JOIN empleado ON empleado.cedula = rutas.id_emple
    INNER JOIN buses ON buses.matricula = rutas.id_buses
    INNER JOIN destino ON destino.id_destino = rutas.id_destino;");
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
        $query=$con->query("SELECT * FROM empleado");
        return recorrer($query);
    }
    function mostrarBuses(){
        global $con;
        $query=$con->query("SELECT buses.matricula FROM buses");
        return recorrer($query);
    }
    function actualizarHorario($ced_emp, $id_des, $id_mat,$fecha){
        global $con;
        $query=$con->query("INSERT INTO rutas (id_emple, id_destino, id_buses, fecha) VALUES ('1207564565', '4', 'hps-453', '2020-09-17')");
    }
    function actualizarDestino($id_des,$fecha,$hora, $ced,$id_bus){
        global $con;
        $fecha1=consulta("destino",$id_des);
        $url='admin-1.php';
        
        if($fecha1[0]['fecha_1']=="0000-00-00"){
            $query=$con->query("UPDATE destino SET fecha_1 = '$fecha', hora_1 = '$hora' WHERE destino.id_destino = $id_des");
            $ruta=buscarRutas($id_des,$ced,$fecha,$id_bus);
            if($ruta[0]['fecha']!=$fecha){
                if($ruta[0]['matricula']!=$id_bus){
                $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
                }else{
                    $query3=$con->query("UPDATE destino SET $fecha = '0000-00-00', $hora = '0' WHERE `destino`.`id_destino` = $id_des");     
                }
            }else{
                $query2=$con->query("UPDATE destino SET $fecha = '0000-00-00', $hora = '0' WHERE `destino`.`id_destino` = $id_des"); 
            }
            
        }elseif ($fecha1[0]['fecha_2']=="0000-00-00") {
            if($fecha==$fecha1[0]['fecha_1']){
                echo '<script> alert ("ya estan ocupadas las tres fechas si quiere insertar una nueva elimine la fecha que reemplazara ")</script>';
                
                
            }else{
                $query=$con->query("UPDATE destino SET fecha_2 = '$fecha', hora_2 = '$hora' WHERE destino.id_destino = $id_des");
                $ruta=buscarRutas($id_des,$ced,$fecha,$id_bus);
                if($ruta[0]['fecha']!=$fecha){
                    if($ruta[0]['matricula']!=$id_bus){
                        $query2=$con->query("INSERT INTO rutas (ID, id_emple, id_destino, id_buses, fecha) VALUES (NULL ,$ced, $id_des, '$id_bus', '$fecha')");
                    echo '<meta http-equiv=refresh content="1; '.$url.'">';
                    die;
                    }else{
                        $query3=$con->query("UPDATE destino SET $fecha = '0000-00-00', $hora = '0' WHERE `destino`.`id_destino` = $id_des");     
                    }
                }else{
                    $query2=$con->query("UPDATE destino SET $fecha = '0000-00-00', $hora = '0' WHERE `destino`.`id_destino` = $id_des"); 
                }
            }
            
            
        }elseif ($fecha1[0]['fecha_3']=="0000-00-00") {
            if($fecha==$fecha1[0]['fecha_2']){
                echo '<script> alert ("ya estan ocupadas las tres fechas si quiere insertar una nueva elimine la fecha que reemplazara ")</script>';
                
            }else{
                $query=$con->query("UPDATE destino SET fecha_3 = '$fecha', hora_3 = '$hora' WHERE destino.id_destino = $id_des");
                $ruta=buscarRutas($id_des,$ced,$fecha,$id_bus);
                if($ruta[0]['fecha']!=$fecha){
                    if($ruta[0]['matricula']!=$id_bus){
                    $query2=$con->query("INSERT INTO rutas (ID, id_emple, id_destino, id_buses, fecha) VALUES (NULL ,$ced, $id_des, '$id_bus', '$fecha')");
                    echo '<meta http-equiv=refresh content="1; '.$url.'">';
                    die;
                    }else{
                        $query3=$con->query("UPDATE destino SET $fecha = '0000-00-00', $hora = '0' WHERE `destino`.`id_destino` = $id_des");     
                    }
                }else{
                    $query2=$con->query("UPDATE destino SET $fecha = '0000-00-00', $hora = '0' WHERE `destino`.`id_destino` = $id_des"); 
                }  
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