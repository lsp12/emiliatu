<div class="row" style="width: 60%; margin-left: auto;margin-right: auto;">
                
                <h2 class="text-center">Rutas establecidas</h2>
                <!-- <canvas id="confirmados2"></canvas> -->
                <table class="table table-striped table-dark rounded-lg" id="tabla">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Destino</th>
                            
                            <th scope="col">Descripcion</th>
                            <th scope="col">Accion</th>
                            
                            
                          </tr>
                        </thead>
                        
                        <tbody>
                    <?php
                    
                    
                     
                        $horario=Horarios();
                            
                        foreach ($horario as $fila) {
                            
                          echo "
                          <tr>
                          <th scope='row'>".$fila['ID']."</th>
                          <td>".$fila['nombre']."</td>
                          
                          
                          </td>
                          <td>
                          <p>".$fila['fecha'] ." Hora de salida ".$fila['hora']."</p>
                         
                          </td>
                          <td>
                          <a href='borrar.php?id=".$fila['ID']."&fecha=fecha_1&hora=hora_1' class='btn btn-primary ml-5 mb-2'>Eliminar</a><br>
                          
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
                <h2 class="text-center">Conductores</h2>
                <!-- <canvas id="provincia" ></canvas> -->
                <table class="table table-striped table-dark rounded-lg" id="tabla">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Conductor</th>
                            <th scope="col">Bus</th>
                            <th scope="col">Fecha de salida</th>
                            
                            
                          </tr>
                        </thead>
                        
                        <tbody>
                    <?php
                    
                    
                     $rutas=mostrarRutinas();
                        
                            
                        foreach ($rutas as $fila) {
                            
                          echo "
                          <tr>
                          <th scope='row'>".$fila['ID']."</th>
                          <td>".$fila['nombre']."</td>
                          <td>".$fila['nombre_emp']."</td>
                          <td>".$fila['matricula']."</td>
                          <td>".$fila['fecha']."</td>
                          </tr>        
                          ";
                        }
                                                  
                        ?>
                        
                        </tbody>
                      </table>


            </div>
            <div class="col-6" style="width: 70%; margin-left: auto;margin-right: auto;">
                <h2 class="text-center">Fallecidos por Cantones</h2>
                <!-- <canvas id="provincia2" ></canvas> -->
            </div>
          </div>
          <div class="" style="width: 70%; margin-left: auto;margin-right: auto;">
            <h2 class="text-center">Recuperados</h2>
            <!-- <canvas id="provincia3"></canvas> -->
        </div>