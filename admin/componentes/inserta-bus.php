<div class="tab-pane fade mb-5 p-4" style="background-color: white;" id="v-pills-profile-4" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div>
                <h2>Insertar Buses</h2>
                    <form method="POST"  action="admin-1.php">
                        <div class="form-group row mb-4">
                        <div class="col-6">
                          <label for="exampleFormControlSelect2">Matricula</label>
                          <input type="text" class="form-control" name="matricula" id="">
                          </div>

                          <div class="col-6">
                          <label for="exampleFormControlSelect2">Peso en kg</label>
                          <input type="text" class="form-control" name="Peso" id="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-5">
                          <label for="exampleFormControlSelect2">Altura</label>
                          <input type="text" class="form-control" name="Altura" id="">
                          </div>

                          <div class="col-4">
                          <label for="exampleFormControlSelect2">Numero de Acientos</label>
                          <input type="text" class="form-control" name="capacidad" id="">
                          </div>
                          <div class="col-3">
                          <label for="exampleFormControlSelect2">Estado del vehiculo</label>
                          <select name="estado" id="" class="form-control">
                              <option value="activo">activo</option>
                              <option value="inactivo">inactivo</option>
                          </select>
                          </div>
                          
                        </div>
                        
                        <input type="submit" value="Guardar" class="btn btn-primary" name="guardar1">
                        
                      </form>
                      <?php 
                      if(isset($_POST['guardar1'])){
                        $matricula=$_POST['matricula'];
                        $Peso=$_POST['Peso'];
                        $Altura=$_POST['Altura'];
                        $capacidad=$_POST['capacidad'];
                        $estado=$_POST['estado'];
                        
                        
                        InsertarBus($matricula,$peso,$Altura,$capacidad,$estado);
                        
                      }
                      
                      ?>
            </div>
            <div>
            <h2 class="text-center">Tabla de Buses</h2>
                      <table class="table table-striped rounded-lg" id="tabla6">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Matricula</th>
                            <th scope="col">Estado</th>
                            
                            <th scope="col" style="text-align: center;">Cambiar estado</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                    <?php
                    $usuario=EstadoBs();
                     
                        foreach($usuario as $li){
                          echo "
                                <tr>
                                <th scope='row'>".$li['numeroVehiculo']."</th>
                                <td>".$li['matricula']."</td>
                                <td>".$li['estado']."</td>
                                
                                <td style='text-align: center;''>
                                  <a href='borrar.php?ma_activo=".$li['matricula']."' class='btn btn-primary ml-2 mb-1 p-2'>Activo</a><br>
                                  <a href='borrar.php?ma_inactivo=".$li['matricula']."' class='btn btn-primary ml-2 mb-1 p-1'>Inactivo</a><br>
                                </td>
                                </tr>        
                                ";
                        }
                       
                                                  
                        ?>
                        
                        </tbody>
                      </table>
            </div>
                     
</div>