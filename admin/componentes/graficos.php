<div class="row" style="width: 60%; margin-left: auto;margin-right: auto;">
                
                <h2 class="text-center">Rutas establecidas</h2>
                <!-- <canvas id="confirmados2"></canvas> -->
                <table class="table table-striped table-dark rounded-lg" id="tabla">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Descripcion</th>
                            
                            
                          </tr>
                        </thead>
                        
                        <tbody>
                    <?php
                    $usuario=mostrarUsuario();
                    
                     
                        
                            
                        foreach ($destino as $fila) {
                            
                          echo "
                          <tr>
                          <th scope='row'>".$fila['id_destino']."</th>
                          <td>".$fila['nombre']."</td>
                          <td>
                          ".$fila['fecha_1'] ." Hora de salida ".$fila['hora_1']."<a href='borrar.php?id=".$fila['id_destino']."&fecha=fecha_1&hora=hora_1' class='btn btn-primary ml-5 mb-2'>Eliminar</a><br>
                          ".$fila['fecha_2'] ." Hora de salida ".$fila['hora_2']."<a href='borrar.php?id=".$fila['id_destino']."&fecha=fecha_2&hora=hora_2' class='btn btn-primary ml-5 mb-2'>Eliminar</a><br>
                          ".$fila['fecha_3'] ." Hora de salida ".$fila['hora_3']."<a href='borrar.php?id=".$fila['id_destino']."&fecha=fecha_3&hora=hora_3' class='btn btn-primary ml-5 mb-2'>Eliminar</a><br>
                          </td>
                          </tr>        
                          ";
                        }
                                                  
                        ?>
                        
                        </tbody>
                      </table>
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