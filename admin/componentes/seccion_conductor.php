<div class="tab-pane fade mb-5 p-4" style="background-color: white;" id="v-pills-profile-3" role="tabpanel" aria-labelledby="v-pills-profile-tab">
<h2 class="text-center">Tabla general</h2>
                      <table class="table table-striped rounded-lg" id="tabla4">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre de Usuario</th>
                            <th scope="col">Correo electronico</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Estado</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                    <?php
                    $usuario=EstadoPg();
                     
                        foreach($usuario as $li){
                          echo "
                                <tr>
                                <th scope='row'>".$li['id_user']."</th>
                                <td>".$li['username']."</td>
                                <td>".$li['email']."</td>
                                <td>".$li['nombre']."</td>
                                <td>
                                  <a href='borrar.php?id_acepta=".$li['id']."' class='btn btn-primary ml-5 mb-2'>Aprobar Pago</a><br>
                                  <a href='borrar.php?id_rechaza=".$li['id']."' class='btn btn-primary ml-5 mb-2'>Rechazar Pago</a><br>
                                </td>
                                </tr>        
                                ";
                        }
                       
                                                  
                        ?>
                        
                        </tbody>
                      </table>
                    </div>