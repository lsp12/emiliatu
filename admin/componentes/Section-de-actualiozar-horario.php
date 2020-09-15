<div class="tab-pane fade mb-5 p-4" style="background-color: white;" id="v-pills-profile-2" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h2>Horario semanal</h2>
                    <form method="POST"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                        <div class="form-group row mb-4">
                        <div class="col-6">
                          <label for="exampleFormControlSelect2">Destino</label>
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

                          <div class="col-6">
                          <label for="exampleFormControlSelect2">Conductor</label>
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
                        </div>
                        <div class="form-group row">
                          <div class="col-5">
                          <label for="exampleFormControlSelect2">Bus</label>
                          <select class="form-control" id="tipo" name="options2">
                            <option value="">Seleciona</option>
                            <option value="Contagiados">Contagiados</option>
                            <option value="Recuperados">Recuperados</option>
                            <option value="Muertos">Fallecidos</option>
                          </select>
                          </div>
                          <div class="col-5">
                          <label for="exampleFormControlSelect2">Dia de salida</label>
                          <select class="form-control" id="tipo" name="options2">
                            <option value="">Seleciona</option>
                            <option value="Contagiados">Contagiados</option>
                            <option value="Recuperados">Recuperados</option>
                            <option value="Muertos">Fallecidos</option>
                          </select>
                          </div>
                          <div class="col-2">
                          <label for="exampleFormControlSelect2">hora de salida</label>
                          <input type="time" name="llegada" id="" >
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
                    </div>
                      
                  </div>
                </div>
              </div>