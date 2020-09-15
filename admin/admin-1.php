<?php
    require_once('../modelo/admin.php');
try {
    $conexion = new PDO("mysql:host=localhost;dbname=covid19;", "root", "");
    $mostrar=$conexion->prepare('SELECT * FROM paises');
    $mostrar->execute();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
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
            
            <div class="row">
                <div class="col-3">
                  <div class="nav flex-column nav-pills bg-dark rounded-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Vista general</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">actualizar datos</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile-2" role="tab" aria-controls="v-pills-profile" aria-selected="false">Actualizar horario</a>
                    
                  </div>
                </div>
                <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <?php
                        include_once("componentes/Seccion-tabla-y-buscador.php");
                        include_once("componentes/Seccion-de-formulario-boleto.php");
                        include_once("componentes/Section-de-actualiozar-horario.php");
                        include_once("componentes/graficos.php");
                    ?>              
        </div>
        </div>
    </div>
    <div>
    </div>


    
    
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
    <?php
                    $mostrar=$conexion->prepare('SELECT * FROM paises');
                    $mostrar->execute();
                    $fallecidos=0;
                    $recuperados=0;
                    $contagios=0;
                    foreach($mostrar as $fila){
                    $fallecidos+=$fila['Muertos'];
                    $recuperados+=$fila['Recuperados'];
                    $contagios+=$fila['Contagiados'];
                    
                    }
                    include_once("componentes/scrip-de-graficos.php");
        ?>
    <?php
        if (isset($_POST['enviar']) ){
            $id = $_POST["options"];
            $tipo = $_POST["options2"];
            $valo = $_POST["valor"];
            echo $id;
            echo $tipo;
            echo $valo;
            $editar=$conexion->prepare("UPDATE `paises` SET `$tipo` = '$valo' WHERE `ID` = $id");
            $editar->execute();

            
        }
    ?>
    
</body>
<?php
} catch (\Throwable $th) {
    
    echo "Error: " . $e->getMessage();
}
?>
</html>
