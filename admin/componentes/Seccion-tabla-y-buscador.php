                  
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <form class="form-inline" method="POST">
                    <div class="form-group mb-2">
                        <label for="staticEmail2" class="">Buscar por Correo electronico</label>
                        <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Buscar por Correo electronico"> -->
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        
                        <input type="email" class="form-control" id="inputPassword2" placeholder="Correo electronico" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="buscar">Buscar</button>
                    </form>
                    <h2 class="text-center">Tabla general</h2>
                      <table class="table table-striped table-dark rounded-lg" id="tabla">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre de Usuario</th>
                            <th scope="col">Correo electronico</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                    <?php
                    $usuario=mostrarUsuario();
                      if(isset($_POST['buscar'])){
                        if($_POST['email']==null){
                         
                          foreach ($usuario as $fila) {
                            
                            echo "
                            <tr>
                            <th scope='row'>".$fila['id_user']."</th>
                            <td>".$fila['username']."</td>
                            <td>".$fila['email'] ."</td>
                            </tr>        
                            ";
                        }                   
                        }else{
                          $email=$_POST['email'];
                        $buscar=Buscar($email);
                        foreach($buscar as $li){
                          echo "
                                <tr>
                                <th scope='row'>".$li['id_user']."</th>
                                <td>".$li['username']."</td>
                                <td>".$li['email'] ."</td>
                                </tr>        
                                ";
                        }
                        }                        
                      }else{
                        
                            
                        foreach ($usuario as $fila) {
                            
                            echo "
                            <tr>
                            <th scope='row'>".$fila['id_user']."</th>
                            <td>".$fila['username']."</td>
                            <td>".$fila['email'] ."</td>
                            </tr>        
                            ";
                        }
                      }                            
                        ?>
                        
                        </tbody>
                      </table>
                    </div>