<div class="row pt-5" style="width: 60%; margin-left: auto;margin-right: auto;">
                
                <h2 class="text-center">Rutas establecidas</h2>
                <!-- <canvas id="confirmados2"></canvas> -->
                <table class=" rounded-lg" id="tabla1">
                        <thead>
                          <tr class='text-center'>
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
                          <tr class='text-center'>
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
          <div class="row pt-5">
            <div class="col-6" style="width: 100%; margin-left: auto;margin-right: auto;">
                <h2 class="text-center p-4 mt-3">Conductores</h2>
                <!-- <canvas id="provincia" ></canvas> -->
                <table class="table table-striped table rounded-lg" id="tabla2">
                        <thead>
                          <tr class='text-center'>
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
          </div>
            
            <div class="col-6" style="width: 100%; margin-left: auto;margin-right: auto;">
                <h2 class="text-center p-4 mt-3">Boletos comprados</h2>
                
                <table class="table table-striped table rounded-lg" id="tabla3">
                        <thead>
                          <tr class='text-center'>
                            <th scope="col">#</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Nombre Usuario</th>
                            <th scope="col">Fecha de Compra</th>
                            <th scope="col">Accion</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                    <?php
                    
                    
                    $boletos=BoletosCom();  
                        foreach ($boletos as $fila) {
                          echo "
                            <tr class='text-center'>
                              <th scope='row'>".$fila['num_boleto']."</th>
                              <td>".$fila['nombre']."</td>
                              <td>".$fila['username']."</td>
                              <td>".$fila['fecha_compra']."</td>
                              <td>
                              <a href='borrar.php?num_boleto=".$fila['num_boleto']."' class='btn btn-danger ml-5 mb-2'>Eliminar</a><br>
                              </td>
                            </tr>        
                          ";
                        }
                      ?>
                        </tbody>
                      </table>
                <!-- <canvas id="provincia2" ></canvas> -->
            </div>
          
        