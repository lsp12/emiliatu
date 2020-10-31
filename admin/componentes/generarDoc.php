<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">


                <h2>Boletos vendidos</h2>
                    <form method="POST"  action="reporte.php">
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

                          
                        </div>
                        
                        <input type="submit" value="Generar" class="btn btn-primary" name="Generar">
                        
                      </form>

                      <?php 
                      if(isset($_POST['Generar'])){
                        $id_des=$_POST['id_destino'];
                        
                        Destinodoc($id_des);
                        
                        
                      }
                      
                      ?>
                    </div>
                      
                
                
                    