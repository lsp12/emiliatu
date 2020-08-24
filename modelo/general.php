<?php

require_once('../database/db.php');

$con = connectDatabase();

function recorrer($query){
    $rows = [];
    while($row = $query->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function consulta($tabla, $name_id_tabla){
    global $con;
    $query = $con->query("SELECT * FROM $tabla ORDER BY $name_id_tabla DESC");
    return recorrer($query);
}

function añadirUsuario($nombre, $email, $contraseña){
    global $con;
    $con->query("INSERT INTO `usuario` VALUES (NULL, '$nombre', '$email', '$contraseña')");
    $con=null;
}
function confirmar($correo, $pasword){	
			global $con;
			//$con=connectDatabase();
			$consulta="SELECT email, pasword FROM usuario where email='$correo' and pasword='$pasword'";
			$resultado=mysqli_query($con,$consulta);
			$filas=mysqli_num_rows($resultado);
			if ($filas>0) {
                //header('location: registro.php');
                echo "<script>window.locationf='registro.php';</script>";
                $correo=null;
			    $pasword=null;
			}else{
            echo"<script>alert('hola');</script>";
            echo "<script>window.locationf='registro.php';</script>";
            //header("location: registro.php");
			}			
		
} 
