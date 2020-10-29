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
        /* echo "$id_des+$ced+$fecha+$id_bus"; */
        global $con;
        $query = $con->query("SELECT
        destino.nombre,
        empleado.nombre_emp,
        buses.matricula,
        rutas.id_emple,
        rutas.fecha
    FROM
        rutas
    INNER JOIN empleado ON empleado.cedula = rutas.id_emple
    INNER JOIN buses ON buses.matricula = rutas.id_buses
    INNER JOIN destino ON destino.id_destino = rutas.id_destino
    WHERE
        (
            (
                buses.matricula = '$id_bus' OR empleado.cedula = $ced
            ) AND destino.id_destino = $id_des
        ) AND(
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
    function actualizarDestino($id_des,$fecha2,$hora, $ced,$id_bus){
        $fecha = date("yy-m-d", strtotime($fecha2));
        global $con;
        $fecha1=consulta("destino",$id_des);
        $url='admin-1.php';
        
        if($fecha1[0]['fecha_1']=="0000-00-00"){
            $query=$con->query("UPDATE destino SET fecha_1 = '$fecha', hora_1 = '$hora' WHERE destino.id_destino = $id_des");
            $ruta=buscarRutas($id_des,$ced,$fecha,$id_bus);
            $fecha4=$ruta[0]['fecha'];
            $nom=$ruta[0]['id_emple'];
            $bus=$ruta[0]['matricula'];
            if($fecha4!=$fecha){
                if($bus!=$id_bus){
                    if($nom!=$ced){
                        $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                        echo '<meta http-equiv=refresh content="1; '.$url.'">';
                        die;
                    }elseif($fecha4!=$fecha){
                        $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                    echo '<meta http-equiv=refresh content="1; '.$url.'">';
                    die;
                    }else{
                        echo '<script> alert ("El conductor ya esta ocupado el dia selecionado")</script>';
                        $query3=$con->query("UPDATE destino SET fecha_1 = '0000-00-00', hora_1 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                        echo '<meta http-equiv=refresh content="1; '.$url.'">';
                        die;
                    }
                
            }elseif($fecha4!=$fecha){
                    
                if($nom!=$ced){
                    $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                    echo '<meta http-equiv=refresh content="1; '.$url.'">';
                    die;
                }elseif($fecha4!=$fecha){
                    $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
                }else{
                    echo '<script> alert ("El conductor ya esta ocupado el dia selecionado")</script>';
                    $query3=$con->query("UPDATE destino SET fecha_1 = '0000-00-00', hora_1 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                    echo '<meta http-equiv=refresh content="1; '.$url.'">';
                    die;
                }
                }else{
                    echo '<script> alert ("El buz ya esta ciendo utilizado ese dia elimine el conductor con el vehiculo para usarlo")</script>';
                    $query3=$con->query("UPDATE destino SET fecha_1 = '0000-00-00', hora_1 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                    echo '<meta http-equiv=refresh content="1; '.$url.'">';
                    die;
                }
           
            
            }else{
                echo '<script> alert ("ya estan ocupadas la elimine la  conductor para reemplazar")</script>';
                $query3=$con->query("UPDATE destino SET fecha_1 = '0000-00-00', hora_1 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
            }
            
        }elseif ($fecha1[0]['fecha_2']=="0000-00-00") {
            if($fecha==$fecha1[0]['fecha_1']){
                echo '<script> alert ("ya estan ocupadas las tres fechas si quiere insertar una nueva elimine la fecha que reemplazara ")</script>';
                
                
            }else{

                $query=$con->query("UPDATE destino SET fecha_2 = '$fecha', hora_2 = '$hora' WHERE destino.id_destino = $id_des");
                $ruta=buscarRutas($id_des,$ced,$fecha,$id_bus);
                $fecha4=$ruta[0]['fecha'];
                $nom=$ruta[0]['id_emple'];
                $bus=$ruta[0]['matricula'];
            if($fecha4!=$fecha){
                if($bus!=$id_bus){
                    if($nom!=$ced){
                        $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
                    }elseif($fecha4!=$fecha){
                        $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
                    }else{
                        echo '<script> alert ("El buz ya esta ciendo utilizado ese dia elimine el conductor con el vehiculo para usarlo")</script>';
                        $query3=$con->query("UPDATE destino SET fecha_2 = '0000-00-00', hora_2 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                        echo '<meta http-equiv=refresh content="1; '.$url.'">';
                        die;
                    }
                
                    
                }elseif($fecha4!=$fecha){
                    
                    if($nom!=$ced){
                        $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
                    }elseif($fecha4!=$fecha){
                        $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
                    }else{
                        echo '<script> alert ("El buz ya esta ciendo utilizado ese dia elimine el conductor con el vehiculo para usarlo")</script>';
                        $query3=$con->query("UPDATE destino SET fecha_2 = '0000-00-00', hora_2 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                        echo '<meta http-equiv=refresh content="1; '.$url.'">';
                        die;
                    }
                    }else{
                        echo '<script> alert ("El buz ya esta ciendo utilizado ese dia elimine el conductor con el vehiculo para usarlo")</script>';
                        
                        $query3=$con->query("UPDATE destino SET fecha_2 = '0000-00-00', hora_2 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                        echo '<meta http-equiv=refresh content="1; '.$url.'">';
                        die;
                    }
                    
                }else{
                    echo '<script> alert ("ya estan ocupadas la elimine la  conductor para reemplazar")</script>';
                    $query3=$con->query("UPDATE destino SET fecha_2 = '0000-00-00', hora_2 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                    echo '<meta http-equiv=refresh content="1; '.$url.'">';
                    die;
                }
            }
            
            
        }elseif ($fecha1[0]['fecha_3']=="0000-00-00") {
            if($fecha==$fecha1[0]['fecha_2']){
                echo '<script> alert ("ya estan ocupadas las tres fechas si quiere insertar una nueva elimine la fecha que reemplazara ")</script>';
                
            }else{
                $query=$con->query("UPDATE destino SET fecha_3 = '$fecha', hora_3 = '$hora' WHERE destino.id_destino = $id_des");
                $ruta=buscarRutas($id_des,$ced,$fecha,$id_bus);
                $fecha4=$ruta[0]['fecha'];
                $nom=$ruta[0]['id_emple'];
                $bus=$ruta[0]['matricula'];
            if($fecha4!=$fecha){
                if($bus!=$id_bus){
                    if($nom!=$ced){
                        $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
                    }elseif($fecha4!=$fecha){
                        $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
                    }else{
                        echo '<script> alert ("El buz ya esta ciendo utilizado ese dia elimine el conductor con el vehiculo para usarlo")</script>';
                        
                        $query3=$con->query("UPDATE destino SET fecha_3 = '0000-00-00', hora_3 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                        echo '<meta http-equiv=refresh content="1; '.$url.'">';
                        die;
                    }
                   
                }elseif($fecha4!=$fecha){
                    
                    if($nom!=$ced){
                        $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
                    }elseif($fecha4!=$fecha){
                        $query3=$con->query("INSERT INTO `rutas` (`ID`, `id_emple`, `id_destino`, `id_buses`, `fecha`) VALUES (NULL, $ced, $id_des, '$id_bus', '$fecha')");
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
                die;
                    }else{
                        echo '<script> alert ("El buz ya esta ciendo utilizado ese dia elimine el conductor con el vehiculo para usarlo")</script>';
                        
                        $query3=$con->query("UPDATE destino SET fecha_3 = '0000-00-00', hora_3 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                        echo '<meta http-equiv=refresh content="1; '.$url.'">';
                        die;
                    }

                    }else{
                        echo '<script> alert ("El buz ya esta ciendo utilizado ese dia elimine el conductor con el vehiculo para usarlo")</script>';
                        echo var_dump($ruta);
                        $query3=$con->query("UPDATE destino SET fecha_3 = '0000-00-00', hora_3 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                        echo '<meta http-equiv=refresh content="1; '.$url.'">';
                        die;
                    }
                }else{
                    echo '<script> alert ("ya estan ocupadas la elimine la  conductor para reemplazar")</script>';
                    $query3=$con->query("UPDATE destino SET fecha_3 = '0000-00-00', hora_3 = '0' WHERE `destino`.`id_destino` = $id_des"); 
                    echo '<meta http-equiv=refresh content="1; '.$url.'">';
                    die;
                }
            }
            
            
        }else{
            echo '<script> alert ("ya estan ocupadas las tres fechas si quiere insertar una nueva elimine la fecha que reemplazara ")</script>';
        }
        $fecha=null;
        $bus=null;
    }
    function BusquedaFecha($fecha, $id_bus, $id_emplea){
        global $con;
        $aux=0;
        $url='admin-1.php';
            $query=$con->query("SELECT * FROM rutas WHERE rutas.id_emple = $id_emplea AND rutas.fecha ='$fecha'");
            $primero =recorrer($query);
            
            if($primero==null){
                $aux=1;
                $query=$con->query("SELECT * FROM rutas WHERE rutas.id_buses = '$id_bus' AND rutas.fecha ='$fecha'");
                $segundo=recorrer($query);
                if($segundo==null){
                    $aux=2;
                    return $aux;
                }else{
                    $aux=0;
                    echo '<script> alert ("ya estan ocupado el bus elimine para reemplazar")</script>';
                    return $aux;
                    echo '<meta http-equiv=refresh content="1; '.$url.'">';
                }
            }else{
                $aux=0;
                echo '<script> alert ("ya estan ocupadas la elimine la  conductor para reemplazar")</script>';
                return $aux;
                echo '<meta http-equiv=refresh content="1; '.$url.'">';
            }
        
        

        /* return recorrer($query); */
    }

    function agregarfecha($id_emplea,$id_destino, $id_bus, $fecha, $hora){
        global $con;
        $url='admin-1.php';
        $busqueda=BusquedaFecha($fecha, $id_bus, $id_emplea);
        var_dump($busqueda);
        echo $busqueda==null;
        if($busqueda==2){

            $query=$con->query("INSERT INTO `rutas`(
                `ID`,
                `id_emple`,
                `id_destino`,
                `id_buses`,
                `fecha`,
                `hora`
            )
            VALUES(
                NULL,
                '$id_emplea',
                '$id_destino',
                '$id_bus',
                '$fecha',
                '$hora'
            )");
            echo '<script> alert ("Ingresado correctamente")</script>';
            
            echo '<meta http-equiv=refresh content="1; '.$url.'">';
            die;
        }else{
            echo '<script> alert ("ya estan ocupadas la elimine la  conductor para reemplazar")</script>';
            
            echo '<meta http-equiv=refresh content="1; '.$url.'">';
            die;
        }
    }
    function Horarios(){
        global $con;
        $query=$con->query("SELECT
		rutas.ID,
        destino.nombre,
        rutas.fecha,
        rutas.hora
    FROM
        `rutas`
    INNER JOIN destino ON destino.id_destino = rutas.id_destino	 ORDER BY rutas.id_destino ASC");

        return recorrer($query);
    }
    function BoletosCom(){
        global $con;
        $query=$con->query("SELECT
        boleto.num_boleto,
        boleto.numero_pasj,
        boleto.id_usuario,
        usuario.username,
        boleto.fecha_compra,
        destino.nombre
    FROM
        boleto
    INNER JOIN usuario ON usuario.id_user = boleto.id_usuario
    INNER JOIN destino ON destino.id_destino = boleto.id_destino");

    return recorrer($query);
    }
    function EstadoPg(){
        global $con;
        $query = $con->query("SELECT usuario.id_user, usuario.username, usuario.email, compras.id, destino.nombre FROM compras 
        INNER JOIN usuario ON usuario.id_user=compras.id_usuario INNER JOIN destino ON destino.id_destino = compras.id_destino");
        return recorrer($query);
        }
?>