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