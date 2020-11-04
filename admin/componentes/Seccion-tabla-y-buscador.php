
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h2 class="text-center">Tabla general</h2>
                      <table class="table table-striped rounded-lg" id="tabla">
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
                    