<?php
ob_start();
    require_once('../modelo/admin.php');
    session_start();
    $id=$_SESSION['user_id']; 
      
      if($id==null){
 
        header("location: login/index.php");
        }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
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
    <a class="nav-link active text-secondary p-3 mb-2" style="background-color: rgba(248, 251, 255, 0.904);border-radius: 15%;" href="../cerrar.php">Cerrar sesion</a>
  </li>
</ul>
    <div class="container fondo mb-3 pb-4 rounded-lg">
    
        <div class="m-5">
            <h1 class="text-center">Administracion</h1>
            
            <div class="row">
                <div class="col-3">
                  <div class="nav flex-column nav-pills bg-dark rounded-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Vista general</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Insertar nuevo conductor</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile-2" role="tab" aria-controls="v-pills-profile" aria-selected="false">Actualizar horario</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile-3" role="tab" aria-controls="v-pills-profile" aria-selected="false">acreditacion de boleto</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile-4" role="tab" aria-controls="v-pills-profile" aria-selected="false">Insertar bus</a>
                    
                  </div>
                </div>
                <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <?php
                        include_once("componentes/Seccion-tabla-y-buscador.php");
                        include_once("componentes/generarDoc.php");
                        include_once("componentes/AceptacionBoleto.php");
                        include_once("componentes/inserta-bus.php");
                        include_once("componentes/Section-de-actualiozar-horario.php");
                        
                    ?>              
        </div>
        <div class="col-12">
        <?php
        include_once("componentes/graficos.php");
        ?>
        </div>
        </div>
        
    </div>
    
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
