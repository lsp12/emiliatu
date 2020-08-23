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
    $query = $con->query("SELECT * FROM usuario");
    foreach ($query as $lista) {
        if($lista['email']==$correo && $lista['pasword']==$pasword){
            header('Location: ../index.php');
        }else{
            echo '<script>
			alert ("ingreso mal contraseña o email");
			</script>';
        }
    }
    /* if($query == false){
        return [];
    }
    return recorrer($query); */
}
