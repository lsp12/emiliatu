<?php
ob_start();
    require_once('../modelo/admin.php');
    $id_des=$_POST['id_destino'];
                        
    $i=Destinodoc($id_des);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
  
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/Chart.min.js"></script>
        <style>
            body{
                background-image: url(img/g9.jpg); 
                /* background-position: center; */
                background-attachment: fixed;
                background-repeat: no-repeat;


            }
            .fondo{
                background-color: rgba(248, 251, 255, 0.904);
            }
        </style>
    
    
</head>
<body>
<ul class="nav justify-content-end ">
  <li class="nav-item m-2">
    <a class="nav-link active text-secondary p-3 mb-2" style="background-color: rgba(248, 251, 255, 0.904);border-radius: 15%;" href="#">Cerrar Sesion</a>
  </li>
</ul>
    <div class="container fondo mb-3 pb-4 rounded-lg">
    
        <div class="m-5">
            <h1 class="text-center">Administracion</h1>
            
            
    </div>


    
    
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
    <script>
    

    </script>
    <?php 
                    include_once("componentes/scrip-de-graficos.php");
                    ob_end_flush();

        ?>
</body>
</html>
