<div class="tab-pane fade mb-5 p-4" style="background-color: white;" id="v-pills-profile-2" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h2>Horario semanal</h2>
                    <form method="POST"  action="admin-1.php">
                        <div class="form-group row mb-4">
                        <div class="col-6">
                          <label for="exampleFormControlSelect2">Destino</label>
                          <select class="form-control" id="cantones" name="id_destino">
                            <option value="">Seleciona</option>
                            <?php
                            $destino=mostrarDestino();
                            
                            
                            foreach ($destino as $fila) {
                                
                                echo "
                                <option value='".$fila['id_destino'] ."'>".$fila['nombre']."</option>
                                ";
                            }
                        ?>
                          </select>
                          </div>

                          <div class="col-6">
                          <label for="exampleFormControlSelect2">Conductor</label>
                          <select class="form-control" id="cantones" name="conductor">
                            <option value="">Seleciona</option>
                            <?php
                            $conductores=mostrarConductor();
                            
                            foreach ($conductores as $fila) {
                                
                                echo "
                                <option value='".$fila['nombre'] ."'>".$fila['nombre']."</option>
                                ";
                            }
                        ?>
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-5">
                          <label for="exampleFormControlSelect2">Bus</label>
                          <select class="form-control" id="tipo" name="bus">
                          <option value="">Seleciona</option>
                          <?php
                            $buses=mostrarBuses();
                            
                            foreach ($buses as $fila) {
                                
                                echo "
                                <option value='".$fila['matricula'] ."'>".$fila['matricula']."</option>
                                ";
                            }
                        ?>
                          
                          </select>
                          </div>
                          <div class="col-4">
                          <label for="exampleFormControlSelect2">Fecha de salida</label>
                          <input type="date" name="fecha" id="" >
                          </div>
                          <div class="col-3">
                          <label for="exampleFormControlSelect2">hora de salida</label>
                          <input type="time" name="hora" id="" >
                          </div>
                          <!-- <div class="col-3">
                          <label for="exampleFormControlSelect2">hora de llegada</label>
                          <input type="time" name="llegada" id="">
                          </div> -->
                        </div>
                        <!-- <div class="form-group">
                          <label for="exampleFormControlInput1">Ingrese numero</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Solo numeros" name="valor">
                        </div> -->
                        <input type="submit" value="Guardar" class="btn btn-primary" name="enviar">
                        
                      </form>

                      <?php 
                      if(isset($_POST['enviar'])){
                        $id_des=$_POST['id_destino'];
                        $fecha=$_POST['fecha'];
                        $hora=$_POST['hora'];
                        actualizarDestino($id_des, $fecha, $hora);
                      }
                      
                      ?>
                    </div>
                      
                  </div>
                </div>
              </div>