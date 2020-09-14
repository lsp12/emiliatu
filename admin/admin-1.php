<?php
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
    <div class="container fondo mb-3 pb-4 rounded-lg">
        <div class="m-5">
            <h1 class="text-center">Coronavirus en Los Rios</h1>
            
            <div class="row">
                <div class="col-3">
                  <div class="nav flex-column nav-pills bg-dark rounded-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Vista general</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">actualizar datos</a>
                    
                  </div>
                </div>
                <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      <h2 class="text-center">Tabla general</h2>
                      <table class="table table-striped table-dark rounded-lg" id="tabla">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cantones</th>
                            <th scope="col">Contagiados</th>
                            <th scope="col">Fallecidos</th>
                            <th scope="col">Recuperdos</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $mostrar->execute();
                            foreach ($mostrar as $fila) {
                                
                                echo "
                                <tr>
                                <th scope='row'>".$fila['ID']."</th>
                                <td>".$fila['Cantones']."</td>
                                <td>".$fila['Contagiados'] ."</td>
                                <td>".$fila['Muertos']."</td>
                                <td>".$fila['Recuperados']."</td>
                                </tr>        
                                ";
                            }
                        ?>
                        
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">


                      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                        <div class="form-group">
                          <label for="exampleFormControlSelect2">Cantones</label>
                          <select class="form-control" id="cantones" name="options">
                            <option value="">Seleciona</option>
                            <?php
                            $mostrar->execute();
                            foreach ($mostrar as $fila) {
                                
                                echo "
                                <option value='".$fila['ID'] ."'>".$fila['Cantones']."</option>
                                ";
                            }
                        ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect2">Tipo de dato</label>
                          <select class="form-control" id="tipo" name="options2">
                            <option value="">Seleciona</option>
                            <option value="Contagiados">Contagiados</option>
                            <option value="Recuperados">Recuperados</option>
                            <option value="Muertos">Fallecidos</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Ingrese numero</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Solo numeros" name="valor">
                        </div>
                        <input type="submit" value="actualizar" class="btn btn-primary" name="enviar">
                        
                      </form>
                      
                    </div>
                   
                  </div>
                </div>
              </div>
              <div class="row" style="width: 60%; margin-left: auto;margin-right: auto;">
                
                <h2 class="text-center">Cifras Generales de la provincia de "LOS RIOS"</h2>
                <canvas id="confirmados2"></canvas>
            </div>
          <div class="row">
            <div class="col-6" style="width: 70%; margin-left: auto;margin-right: auto;">
                <h2 class="text-center">Casos confirmados por Cantones</h2>
                <canvas id="provincia" ></canvas>
            </div>
            <div class="col-6" style="width: 70%; margin-left: auto;margin-right: auto;">
                <h2 class="text-center">Fallecidos por Cantones</h2>
                <canvas id="provincia2" ></canvas>
            </div>
          </div>
          <div class="" style="width: 70%; margin-left: auto;margin-right: auto;">
            <h2 class="text-center">Recuperados</h2>
            <canvas id="provincia3"></canvas>
        </div>
        </div>
    </div>
    <div>
    </div>


    
    
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="ui.js"></script> -->
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
                    
        ?>
        <script>
        let ctx = document.getElementById('confirmados2');
        var myChart = new Chart(ctx, {
        
        type: 'line',
        data: {
            labels: [`febrero`, `marzo`, 'abril', 'mayo', 'junio', 'julio','agosto'],
            
           
            datasets: [{
                    label: 'muertes',
                    data: [0, 10, 5, 80, 100, "350","<?php echo $fallecidos ?>" ],
                    backgroundColor: 'rgba(118, 0, 0,0.2)',
                    
                borderColor: 'rgb(118, 211, 218)',
                
                    borderWidth: 2
         
                },{
                    label: 'confirmados',
                    data: [6, 120, 500, 1500, 1800, 2799,"<?php echo $contagios ?>"],
                    backgroundColor: [
                        'rgba(54, 75, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 75, 207)'
                    ],
                    borderWidth: 2
         
                },{
                    label: 'recuperados',
                    data: [1, 50, 100, 300, 800, 1500,"<?php echo $recuperados ?>"],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 2
         
                }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })

    let pro=document.querySelector("#provincia");
    contagiados = new Chart(pro, {
    type: 'bar',
    data: {
        <?php $mostrar->execute(); ?>
        labels: [<?php foreach ($mostrar as $fila) {echo "'". $fila['Cantones'] ."',";} ?>],
        datasets: [{
            label: 'Cantones',
            <?php $mostrar->execute(); ?>
            data: [<?php foreach ($mostrar as $fila) {echo  $fila['Contagiados'] .",";} ?>],
            backgroundColor: 
                'rgba(255, 159, 64, 0.2)',
            borderColor: 
                'rgba(255, 159, 64, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
})
let ctx2 =document.querySelector("#provincia2");
muertes = new Chart(ctx2, {
        
        type: 'bar',
        data: {
            labels: [<?php $mostrar->execute(); foreach ($mostrar as $fila) {echo "'". $fila['Cantones'] ."',";}?>],
            datasets: [{
                    label: 'muertes',
                    data: [<?php $mostrar->execute(); foreach ($mostrar as $fila) {echo  $fila['Muertos'] .",";}?>],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    
                borderColor: 'rgba(255, 99, 132, 0.2)',
                
                    borderWidth: 2
         
                }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    })

let ctx3=document.querySelector("#provincia3");
recuperados = new Chart(ctx3, {
        
        type: 'bar',
        data: {
            labels: [<?php $mostrar->execute(); foreach ($mostrar as $fila) {echo "'". $fila['Cantones'] ."',";}?>],
            datasets: [{
                    label: 'recuperado',
                    data: [<?php $mostrar->execute(); foreach ($mostrar as $fila) {echo  $fila['Recuperados'] .",";}?>],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    
                borderColor: 'rgba(75, 192, 192, 0.2)',
                
                    borderWidth: 2
         
                }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    const formulario=document.querySelector("#formulario")
    if(formulario){
    formulario.addEventListener("click",actualizarDatos);
    }
     function actualizarDatos(){
        
    }
    </script>
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
